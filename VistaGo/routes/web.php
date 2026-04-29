<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;

Route::get('/', function () {
    $destinations = Destination::all();
    return view('welcome', compact('destinations'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('destinations', DestinationController::class);
    Route::resource('guides', GuideController::class);
});

require __DIR__.'/auth.php';
