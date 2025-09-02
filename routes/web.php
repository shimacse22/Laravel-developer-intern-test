<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('frontend.index');
});

// ================= COUNTRY ROUTES =================
Route::prefix('countries')->name('countries.')->group(function () {
    Route::get('/', [CountryController::class, 'index'])->name('index');           // List all countries
    Route::post('/', [CountryController::class, 'store'])->name('store');          // Store new country
    Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('edit'); // Edit country
    Route::put('/{country}', [CountryController::class, 'update'])->name('update'); // Update country
    Route::delete('/{country}', [CountryController::class, 'destroy'])->name('destroy'); // Delete country
});

// ================= STATE ROUTES =================
Route::prefix('states')->name('states.')->group(function () {
    Route::get('/', [StateController::class, 'index'])->name('index');           // List all states
    Route::post('/', [StateController::class, 'store'])->name('store');          // Store new state
    Route::get('/{state}/edit', [StateController::class, 'edit'])->name('edit'); // Show edit form
    Route::put('/{state}', [StateController::class, 'update'])->name('update');  // Update state
    Route::delete('/{state}', [StateController::class, 'destroy'])->name('destroy'); // Delete state
});

// ================= CITY ROUTES =================
Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', [CityController::class, 'index'])->name('index');           // List all cities
    Route::post('/', [CityController::class, 'store'])->name('store');          // Store new city
    Route::get('/{city}/edit', [CityController::class, 'edit'])->name('edit');  // Show edit form
    Route::put('/{city}', [CityController::class, 'update'])->name('update');   // Update city
    Route::delete('/{city}', [CityController::class, 'destroy'])->name('destroy'); // Delete city
});


