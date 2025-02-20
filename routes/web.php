<?php

use App\Http\Controllers\RazorpayPaymentController;
use App\Livewire\ApiList;
use App\Livewire\ApiPlayground;
use App\Livewire\Home;
use App\Livewire\PaymentGateway;
use App\Livewire\Plans;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
// razorpay test routes
Route::get('payment', PaymentGateway::class)->middleware('auth:sanctum')->name('payment-gateway');
Route::post('payment', [RazorpayPaymentController::class, 'store'])->middleware('auth:sanctum')->name('payment-gateway.store');

Route::get('plans', Plans::class)->name('plans')->middleware('auth:sanctum');
Route::get('apilist', ApiList::class)->name('apilist')->middleware('auth:sanctum');
Route::get('api-playground/{api}', ApiPlayground::class)->name('apiplayground')->middleware('auth:sanctum');

// cron job route
Route::get('/run-inspire', function () {
    Artisan::call('inspire');
    return 'Inspire command has been run.';
});
require __DIR__ . '/auth.php';
