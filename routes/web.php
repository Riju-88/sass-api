<?php

use App\Http\Controllers\RazorpayPaymentController;
use App\Livewire\Home;
use App\Livewire\Plans;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
// razorpay test routes
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index'])->middleware(['auth']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->middleware(['auth'])->name('razorpay.payment.store');

Route::get('plans', Plans::class)->name('plans')->middleware('auth');

require __DIR__ . '/auth.php';
