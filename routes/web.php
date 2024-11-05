<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('roles', RoleController::class);
    Route::resource('visits', VisitController::class);
    Route::post('/visits/{visit}/exit', [VisitController::class, 'exit'])->name('visits.exit');
    Route::resource('vehicles', VehicleController::class);
    Route::post('/vehicles/{vehicle}/exit', [VehicleController::class, 'exit'])->name('vehicles.exit');
});

require __DIR__.'/auth.php';
