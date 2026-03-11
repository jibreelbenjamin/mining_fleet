<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::middleware(['guest'])->group(function () {
    
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.action')->middleware('guest');
});

Route::middleware(['auth','role:admin,employee,supervisor,manager'])->group(function () {
    
    Route::get('/', function () { return redirect()->route('dashboard'); })->name('root');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});