<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\FuelLogController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ReportController;

Route::middleware(['guest'])->group(function () {
    
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.action')->middleware('guest');
});

Route::middleware(['auth','role:admin,employee,supervisor,manager'])->group(function () {
    Route::middleware(['auth','role:admin'])->group(function () {
        Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('dashboard.vehicle.create');
        Route::post('/vehicle/create/action', [VehicleController::class, 'store'])->name('dashboard.vehicle.create.action');
        Route::get('/vehicle/update/{id}', [VehicleController::class, 'edit'])->name('dashboard.vehicle.update');
        Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('dashboard.vehicle.delete');
        Route::put('/vehicle/update/{id}/action', [VehicleController::class, 'update'])->name('dashboard.vehicle.update.action');
        
        Route::get('/driver/create', [DriverController::class, 'create'])->name('dashboard.driver.create');
        Route::post('/driver/create/action', [DriverController::class, 'store'])->name('dashboard.driver.create.action');
        Route::get('/driver/update/{id}', [DriverController::class, 'edit'])->name('dashboard.driver.update');
        Route::delete('/driver/delete/{id}', [DriverController::class, 'destroy'])->name('dashboard.driver.delete');
        Route::put('/driver/update/{id}/action', [DriverController::class, 'update'])->name('dashboard.driver.update.action');
        
        Route::get('/vehicle-service', [VehicleServiceController::class, 'index'])->name('dashboard.vehicle-service');
        Route::get('/vehicle-service/create', [VehicleServiceController::class, 'create'])->name('dashboard.vehicle-service.create');
        Route::post('/vehicle-service/create/action', [VehicleServiceController::class, 'store'])->name('dashboard.vehicle-service.create.action');
        Route::get('/vehicle-service/update/{id}', [VehicleServiceController::class, 'edit'])->name('dashboard.vehicle-service.update');
        Route::delete('/vehicle-service/delete/{id}', [VehicleServiceController::class, 'destroy'])->name('dashboard.vehicle-service.delete');
        Route::put('/vehicle-service/update/{id}/action', [VehicleServiceController::class, 'update'])->name('dashboard.vehicle-service.update.action');

        Route::get('/user', [UserController::class, 'index'])->name('dashboard.user');
        Route::get('/user/create', [UserController::class, 'create'])->name('dashboard.user.create');
        Route::post('/user/create/action', [UserController::class, 'store'])->name('dashboard.user.create.action');
        Route::get('/user/update/{id}', [UserController::class, 'edit'])->name('dashboard.user.update');
        Route::get('/user/update-password/{id}', [UserController::class, 'edit_password'])->name('dashboard.user.update-password');
        Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.user.delete');
        Route::put('/user/update/{id}/action', [UserController::class, 'update'])->name('dashboard.user.update.action');
        Route::put('/user/update-password/{id}/action', [UserController::class, 'update_password'])->name('dashboard.user.update-password.action');
    });

    Route::middleware(['auth','role:supervisor,manager'])->group(function () {
        Route::get('/approval', [ApprovalController::class, 'index'])->name('dashboard.approval');
        Route::put('/approval/approve/{id}/action', [ApprovalController::class, 'approve'])->name('dashboard.approval.approve.action');
        Route::put('/approval/reject/{id}/action', [ApprovalController::class, 'reject'])->name('dashboard.approval.reject.action');

        Route::get('/booking-list', [BookingListController::class, 'index'])->name('dashboard.booking-list');
        Route::delete('/booking-list/delete/{id}', [BookingListController::class, 'destroy'])->name('dashboard.booking-list.delete');
    });

    Route::middleware(['auth','role:admin,employee'])->group(function () {
        Route::get('/booking', [BookingController::class, 'index'])->name('dashboard.booking');
        Route::get('/booking/create', [BookingController::class, 'create'])->name('dashboard.booking.create');
        Route::post('/booking/create/action', [BookingController::class, 'store'])->name('dashboard.booking.create.action');
        Route::delete('/booking/delete/{id}', [BookingController::class, 'destroy'])->name('dashboard.booking.delete');

        Route::get('/fuel-log', [FuelLogController::class, 'index'])->name('dashboard.fuel-log');
        Route::get('/fuel-log/{id_booking}', [FuelLogController::class, 'create'])->name('dashboard.fuel-log.create');
        Route::post('/fuel-log/create/{id_booking}/action', [FuelLogController::class, 'store'])->name('dashboard.fuel-log.create.action');
        Route::delete('/fuel-log/delete/{id_booking}/{id}', [FuelLogController::class, 'destroy'])->name('dashboard.fuel-log.delete');
    });

    Route::get('/', function () { return redirect()->route('dashboard'); })->name('root');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/vehicle', [VehicleController::class, 'index'])->name('dashboard.vehicle');
    Route::get('/driver', [DriverController::class, 'index'])->name('dashboard.driver');
    Route::get('/log', [LogController::class, 'index'])->name('dashboard.log');

    Route::get('/report', [ReportController::class, 'index'])->name('dashboard.report');
    Route::get('/report/export', [ReportController::class, 'export'])->name('dashboard.report.export');
});