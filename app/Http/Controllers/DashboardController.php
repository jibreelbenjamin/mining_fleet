<?php

namespace App\Http\Controllers;

use App\Charts\BookingDailyChart;
use App\Charts\BookingMonthlyChart;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(BookingDailyChart $dailyChart, BookingMonthlyChart $monthlyChart)
    {
        $booking = Booking::all();
        $vehicle = Vehicle::all();
        $driver = Driver::all();
        $user = User::all();
        $log = Log::all();
        return view('app.dashboard', [ 'dailyChart' => $dailyChart->build(), 'monthlyChart' => $monthlyChart->build() ], compact('booking', 'vehicle', 'driver', 'user', 'log'));
    }
}
