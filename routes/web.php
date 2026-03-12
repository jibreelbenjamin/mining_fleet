<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleServiceController;
use App\Http\Controllers\UserController;

Route::middleware(['guest'])->group(function () {
    
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.action')->middleware('guest');
});

Route::middleware(['auth','role:admin,employee,supervisor,manager'])->group(function () {
    
    Route::get('/', function () { return redirect()->route('dashboard'); })->name('root');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/vehicle', [VehicleController::class, 'index'])->name('dashboard.vehicle');
    Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('dashboard.vehicle.create');
    Route::post('/vehicle/create/action', [VehicleController::class, 'store'])->name('dashboard.vehicle.create.action');
    Route::get('/vehicle/update/{id}', [VehicleController::class, 'edit'])->name('dashboard.vehicle.update');
    Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('dashboard.vehicle.delete');
    Route::put('/vehicle/update/{id}/action', [VehicleController::class, 'update'])->name('dashboard.vehicle.update.action');
    
    Route::get('/driver', [DriverController::class, 'index'])->name('dashboard.driver');
    Route::get('/driver/create', [DriverController::class, 'create'])->name('dashboard.driver.create');
    Route::post('/driver/create/action', [DriverController::class, 'store'])->name('dashboard.driver.create.action');
    Route::get('/driver/update/{id}', [DriverController::class, 'edit'])->name('dashboard.driver.update');
    Route::delete('/driver/delete/{id}', [DriverController::class, 'destroy'])->name('dashboard.driver.delete');
    Route::put('/driver/update/{id}/action', [DriverController::class, 'update'])->name('dashboard.driver.update.action');
    
    Route::get('/vehicle_service', [VehicleServiceController::class, 'index'])->name('dashboard.vehicle_service');
    Route::get('/vehicle_service/create', [VehicleServiceController::class, 'create'])->name('dashboard.vehicle_service.create');
    Route::post('/vehicle_service/create/action', [VehicleServiceController::class, 'store'])->name('dashboard.vehicle_service.create.action');
    Route::get('/vehicle_service/update/{id}', [VehicleServiceController::class, 'edit'])->name('dashboard.vehicle_service.update');
    Route::delete('/vehicle_service/delete/{id}', [VehicleServiceController::class, 'destroy'])->name('dashboard.vehicle_service.delete');
    Route::put('/vehicle_service/update/{id}/action', [VehicleServiceController::class, 'update'])->name('dashboard.vehicle_service.update.action');
    
    Route::get('/user', [UserController::class, 'index'])->name('dashboard.user');
    Route::get('/user/create', [UserController::class, 'create'])->name('dashboard.user.create');
    Route::post('/user/create/action', [UserController::class, 'store'])->name('dashboard.user.create.action');
    Route::get('/user/update/{id}', [UserController::class, 'edit'])->name('dashboard.user.update');
    Route::get('/user/update-password/{id}', [UserController::class, 'edit_password'])->name('dashboard.user.update-password');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.user.delete');
    Route::put('/user/update/{id}/action', [UserController::class, 'update'])->name('dashboard.user.update.action');
    Route::put('/user/update-password/{id}/action', [UserController::class, 'update_password'])->name('dashboard.user.update-password.action');

});