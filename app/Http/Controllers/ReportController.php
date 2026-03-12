<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingExport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $model = Booking::class;
    protected $route = 'dashboard.report';
    protected $view = 'app.report';
    protected $primary = 'id_booking';
    protected $echo = 'laporan';
    protected $page = 'report';

    public function index(Request $request)
    {
        return view($this->view.'.report');
    }

    public function export(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        return Excel::download(new BookingExport($start, $end), 'booking_report.xlsx');
    }
}
