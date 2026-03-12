<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Booking;
use Carbon\Carbon;

class BookingMonthlyChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $year = Carbon::now()->year;

        $labels = [
            'Jan','Feb','Mar','Apr','May','Jun',
            'Jul','Aug','Sep','Oct','Nov','Dec'
        ];

        $data = [];

        $bookings = Booking::selectRaw("
            EXTRACT(MONTH FROM tanggal_mulai)::int as month,
            status,
            COUNT(*) as total
        ")
        ->whereYear('tanggal_mulai',$year)
        ->groupBy('month','status')
        ->get();

        $pending = array_fill(1,12,0);
        $approved = array_fill(1,12,0);
        $rejected = array_fill(1,12,0);
        $completed = array_fill(1,12,0);

        foreach ($bookings as $booking) {

            switch ($booking->status) {

                case 1:
                    $pending[$booking->month] = $booking->total;
                    break;

                case 2:
                    $approved[$booking->month] = $booking->total;
                    break;

                case 3:
                    $rejected[$booking->month] = $booking->total;
                    break;

                case 4:
                    $completed[$booking->month] = $booking->total;
                    break;
            }
        }

        for ($month=1; $month<=12; $month++) {

            $data[] = Booking::whereYear('tanggal_mulai',$year)
                ->whereMonth('tanggal_mulai',$month)
                ->count();
        }

        return $this->chart->areaChart()
            ->setTitle('Data booking tahun ini')
            ->setSubtitle("Tahun $year")
            ->setColors([
                '#facc15', // pending (yellow)
                '#22c55e', // approved (green)
                '#ef4444', // rejected (red)
                '#3b82f6'  // completed (blue)
            ])
            ->addData(array_values($pending), 'Pending')
            ->addData(array_values($approved), 'Approved')
            ->addData(array_values($rejected), 'Rejected')
            ->addData(array_values($completed), 'Completed')
            ->setXAxis($labels)
            ->setGrid();
        }
}