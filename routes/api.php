<?php

use App\Http\Controllers\AnnualTemperatureController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CropProductionController;
use App\Http\Controllers\ScienceController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

// Route::post('/login', function (Request $request) {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         return response()->json(['message' => 'Login successful']);
//     } else {
//         return response()->json(['message' => 'Invalid credentials'], 401);
//     }
// });

// Route::get('/', function () {
//     return 'API';
// });

// Rate limiters defined within the boot method of application's App\Providers\AppServiceProvider class
Route::middleware(['throttle:api'])->group(function () {
    Route::apiResource('users', UserController::class)
        ->middleware('auth:sanctum');
});

Route::controller(ApiAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

// Routes for CropProductionData
Route::controller(CropProductionController::class)->group(function () {
    Route::get('crop-production-data/{perPage?}', 'index');
    Route::post('crop-production-data', 'store')->middleware('auth:sanctum');
    // Route::get('crop-production-data/{cropProductionData}', 'show');
    Route::put('crop-production-data/{cropProductionData}', 'update')->middleware('auth:sanctum');
    Route::delete('crop-production-data/{cropProductionData}', 'destroy')->middleware('auth:sanctum');
});

// Routes for AnnualTemperature
Route::controller(AnnualTemperatureController::class)->group(function () {
    Route::get('annual-temperature/{perPage?}', 'index');
    Route::post('annual-temperature', 'store')->middleware('auth:sanctum');
    // Route::get('annual-temperature/{annualTemperature}', 'show');
    Route::put('annual-temperature/{annualTemperature}', 'update')->middleware('auth:sanctum');
    Route::delete('annual-temperature/{annualTemperature}', 'destroy')->middleware('auth:sanctum');
});

// Routes for Science
Route::controller(ScienceController::class)->group(function () {
    Route::get('science/{perPage?}', 'index');
    Route::post('science', 'store')->middleware('auth:sanctum');
    Route::put('science/{science}', 'update')->middleware('auth:sanctum');
    Route::delete('science/{science}', 'destroy')->middleware('auth:sanctum');
});
