<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        // If the user is an Admin, show them ALL bookings to approve/reject
        if (Auth::user()->role === 'admin') {
            $bookings = Booking::with(['user', 'destination', 'guide'])->get();
            return view('bookings.admin_index', compact('bookings'));
        }

        // If it's a Tourist, only show them THEIR OWN bookings
        $bookings = Booking::with(['destination', 'guide'])->where('user_id', Auth::id())->get();
        return view('bookings.tourist_index', compact('bookings'));
    }

    public function create(Request $request)
    {
        // Grab the destination they clicked on from the URL, and get all available guides
        $destination = Destination::findOrFail($request->destination);
        $guides = Guide::all();
        return view('bookings.create', compact('destination', 'guides'));
    }

    public function store(Request $request)
    {
        // 1. The Security Check
        $validatedData = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'guide_id' => 'nullable|exists:guides,id',
            'visit_date' => 'required|date|after_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:visit_date',
            'visit_time' => 'required|date_format:H:i',
        ], [
            // Custom Error Messages
            'visit_date.after_or_equal' => 'You cannot book a date in the past. Please select today or a future date.',
            'end_date.after_or_equal' => 'End date must be after or equal to the start date.'
        ]);

        // Check for double-booking (Schedule Conflict)
        if (!empty($validatedData['guide_id'])) {
            $conflict = Booking::where('guide_id', $validatedData['guide_id'])
                ->where('visit_date', $validatedData['visit_date'])
                ->whereIn('status', ['Pending', 'Approved']) // Only check active bookings
                ->exists();

            if ($conflict) {
                return back()->withInput()->withErrors([
                    'guide_id' => 'This guide is already booked on the selected date. Please choose another guide or date.'
                ]);
            }
        }

        // Calculate Duration
        $duration = 1;
        if (!empty($validatedData['end_date'])) {
            $start = \Carbon\Carbon::parse($validatedData['visit_date']);
            $end = \Carbon\Carbon::parse($validatedData['end_date']);
            $duration = $start->diffInDays($end) + 1; // +1 to include both start and end days
        }

        // Calculate Total Price
        $destinationPrice = Destination::find($validatedData['destination_id'])->fee;
        $guidePrice = 0;
        if (!empty($validatedData['guide_id'])) {
            $guidePrice = Guide::find($validatedData['guide_id'])->daily_rate * $duration;
        }
        $totalPrice = $destinationPrice + $guidePrice;

        // 2. Save to Database ONLY if it passes the security check
        Booking::create([
            'user_id' => Auth::id(),
            'destination_id' => $validatedData['destination_id'],
            'guide_id' => $validatedData['guide_id'],
            'visit_date' => $validatedData['visit_date'],
            'end_date' => $validatedData['end_date'] ?? null,
            'visit_time' => $validatedData['visit_time'],
            'status' => 'Pending',
            'total_price' => $totalPrice
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking submitted successfully!');
    }

    public function update(Request $request, Booking $booking)
    {
        // This allows the Admin to change the status to 'Approved' or 'Cancelled'
        $booking->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Booking status updated!');
    }

    public function downloadPermit(Booking $booking)
    {
        // Check if user is the owner or an admin
        if (Auth::id() !== $booking->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Only approved bookings can have permits downloaded
        if ($booking->status !== 'Approved') {
            return back()->with('error', 'Permit is not available for this booking yet.');
        }

        // Generate PDF
        $pdf = Pdf::loadView('bookings.permit', compact('booking'));
        return $pdf->download('VistaGo-Entry-Permit-' . $booking->id . '.pdf');
    }
}
