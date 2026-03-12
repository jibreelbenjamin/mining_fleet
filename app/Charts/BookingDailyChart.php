<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Booking;
use Carbon\Carbon;

class BookingDailyChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $now = Carbon::now();
        $days = $now->daysInMonth;

        $labels = [];
        $data = [];

        $bookings = Booking::selectRaw("
            EXTRACT(DAY FROM tanggal_mulai)::int as day,
            status,
            COUNT(*) as total
        ")
        ->whereRaw("DATE_TRUNC('month', tanggal_mulai) = DATE_TRUNC('month', CURRENT_DATE)")
        ->groupBy('day','status')
        ->get();

        $pending = array_fill(1, $days, 0);
        $approved = array_fill(1, $days, 0);
        $rejected = array_fill(1, $days, 0);
        $completed = array_fill(1, $days, 0);

        foreach ($bookings as $booking) {

            switch ($booking->status) {

                case 1:
                    $pending[$booking->day] = $booking->total;
                    break;

                case 2:
                    $approved[$booking->day] = $booking->total;
                    break;

                case 3:
                    $rejected[$booking->day] = $booking->total;
                    break;

                case 4:
                    $completed[$booking->day] = $booking->total;
                    break;
            }
        }

        for ($i=1; $i <= $days; $i++) {
            $labels = range(1,$days);
            $data[] = $bookings[$i] ?? 0;
        }

        return $this->chart->areaChart()
            ->setTitle('Data booking bulan ini')
            ->setSubtitle($now->translatedFormat('F Y'))
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
            ->setGrid();;
        }
}
