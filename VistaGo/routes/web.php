<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GuideController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Models\User;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $featured_destinations = Destination::take(6)->get();
    $expert_guides = Guide::take(4)->get();
    return view('welcome', compact('featured_destinations', 'expert_guides'));
});

Route::get('/explore', function (Request $request) {
    $query = Destination::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('difficulty') && $request->difficulty !== 'All') {
        $query->where('difficulty_level', $request->difficulty);
    }

    if ($request->filled('category') && $request->category !== 'All') {
        $query->where('category', $request->category);
    }

    $destinations = $query->get();

    return view('explore', compact('destinations'));
})->name('explore');

Route::get('/tour-guides', function (Request $request) {
    $guides = Guide::all();
    return view('tour_guides', compact('guides'));
})->name('tour_guides.index');

Route::get('/dashboard', function () {
    $data = [];

    if (Auth::user()->role === 'admin') {
        $data['total_tourists'] = User::where('role', 'tourist')->count();
        $data['total_bookings'] = Booking::count(); // Added this
        $data['pending_bookings'] = Booking::where('status', 'Pending')->count();
        $data['total_destinations'] = Destination::count();

        $data['total_revenue'] = Booking::where('status', 'Approved')->sum('total_price');
    } else {
        $data['total_user_bookings'] = Booking::where('user_id', Auth::id())->count();
        $data['pending_user_bookings'] = Booking::where('user_id', Auth::id())->where('status', 'Pending')->count();
        $data['approved_user_bookings'] = Booking::where('user_id', Auth::id())->where('status', 'Approved')->count();
    }

    return view('dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('destinations', DestinationController::class);
    Route::resource('guides', GuideController::class);
    Route::resource('bookings', BookingController::class);
    
    // PDF Generation Route
    Route::get('/bookings/{booking}/permit', [BookingController::class, 'downloadPermit'])->name('bookings.permit');
});

require __DIR__ . '/auth.php';
