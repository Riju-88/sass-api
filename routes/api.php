<?php

use App\Http\Controllers\AnnualTemperatureController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CropProductionController;
use App\Http\Controllers\DocumentaryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ScienceController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\SteamBestRevController;
use App\Http\Controllers\TopRatedMoviesController;
use App\Http\Controllers\TravelController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// import custom middleware
use App\Http\Middleware\GetFeatureCheck;

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
// Route::middleware(['throttle:api'])->group(function () {
//     Route::apiResource('users', ApiAuthController::class)
//         ->middleware('auth:sanctum');
// });

Route::controller(ApiAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

// Routes for CropProductionData
// Route::controller(CropProductionController::class)->group(function () {
//     Route::get('crop-production-data/{perPage?}', 'index')->middleware('auth:sanctum');
//     Route::post('crop-production-data', 'store')->middleware('auth:sanctum');
//     // Route::get('crop-production-data/{cropProductionData}', 'show');
//     Route::put('crop-production-data/{cropProductionData}', 'update')->middleware('auth:sanctum');
//     Route::delete('crop-production-data/{cropProductionData}', 'destroy')->middleware('auth:sanctum');
// });

// middleware group for CropProduction controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('crop-production-data/{perPage?}', [CropProductionController::class, 'index']);
    Route::post('crop-production-data', [CropProductionController::class, 'store']);
    Route::put('crop-production-data/{cropProductionData}', [CropProductionController::class, 'update']);
    Route::delete('crop-production-data/{cropProductionData}', [CropProductionController::class, 'destroy']);
});

// Routes for AnnualTemperature
// Route::controller(AnnualTemperatureController::class)->group(function () {
//     Route::get('annual-temperature/{perPage?}', 'index');
//     Route::post('annual-temperature', 'store')->middleware('auth:sanctum');
//     // Route::get('annual-temperature/{annualTemperature}', 'show');
//     Route::put('annual-temperature/{annualTemperature}', 'update')->middleware('auth:sanctum');
//     Route::delete('annual-temperature/{annualTemperature}', 'destroy')->middleware('auth:sanctum');
// });

// middleware group for AnnualTemperature controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('annual-temperature/{perPage?}', [AnnualTemperatureController::class, 'index']);
    Route::post('annual-temperature', [AnnualTemperatureController::class, 'store']);
    Route::put('annual-temperature/{annualTemperature}', [AnnualTemperatureController::class, 'update']);
    Route::delete('annual-temperature/{annualTemperature}', [AnnualTemperatureController::class, 'destroy']);
});

// middleware group for Science controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('science/{perPage?}', [ScienceController::class, 'index']);
    Route::post('science', [ScienceController::class, 'store']);
    Route::put('science/{science}', [ScienceController::class, 'update']);
    Route::delete('science/{science}', [ScienceController::class, 'destroy']);
});

// middleware group for Space controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('space/{perPage?}', [SpaceController::class, 'index']);
    Route::post('space', [SpaceController::class, 'store']);
    Route::put('space/{space}', [SpaceController::class, 'update']);
    Route::delete('space/{space}', [SpaceController::class, 'destroy']);
});

// middleware group for Sports controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('sports/{perPage?}', [SportsController::class, 'index']);
    Route::post('sports', [SportsController::class, 'store']);
    Route::put('sports/{sports}', [SportsController::class, 'update']);
    Route::delete('sports/{sports}', [SportsController::class, 'destroy']);
});

// middleware group for documentary controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('documentary/{perPage?}', [DocumentaryController::class, 'index']);
    Route::post('documentary', [DocumentaryController::class, 'store']);
    Route::put('documentary/{documentary}', [DocumentaryController::class, 'update']);
    Route::delete('documentary/{documentary}', [DocumentaryController::class, 'destroy']);
});

// middleware group for food controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('food/{perPage?}', [FoodController::class, 'index']);
    Route::post('food', [FoodController::class, 'store']);
    Route::put('food/{food}', [FoodController::class, 'update']);
    Route::delete('food/{food}', [FoodController::class, 'destroy']);
});

// middleware group for travel controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('travel/{perPage?}', [TravelController::class, 'index']);
    Route::post('travel', [TravelController::class, 'store']);
    Route::put('travel/{travel}', [TravelController::class, 'update']);
    Route::delete('travel/{travel}', [TravelController::class, 'destroy']);
});

// middleware group for steam best revenue controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('steam/{perPage?}', [SteamBestRevController::class, 'index']);
    Route::post('steam', [SteamBestRevController::class, 'store']);
    Route::put('steam/{steam}', [SteamBestRevController::class, 'update']);
    Route::delete('steam/{steam}', [SteamBestRevController::class, 'destroy']);
});

// middleware group for top rated movies controller
Route::middleware(['auth:sanctum', GetFeatureCheck::class])->group(function () {
    Route::get('top-rated-movies/{perPage?}', [TopRatedMoviesController::class, 'index']);
    Route::post('top-rated-movies', [TopRatedMoviesController::class, 'store']);
    Route::put('top-rated-movies/{topRatedMovies}', [TopRatedMoviesController::class, 'update']);
    Route::delete('top-rated-movies/{topRatedMovies}', [TopRatedMoviesController::class, 'destroy']);
});
