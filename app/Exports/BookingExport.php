<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function collection()
    {
        return Booking::with(['user', 'vehicle', 'driver', 'approvals', 'fuelLogs'])
            ->whereBetween('tanggal_mulai', [$this->start, $this->end])
            ->get()
            ->map(function($booking) {
                $statusText = match($booking->status) {
                    1 => 'Pending',
                    2 => 'Approved',
                    3 => 'Rejected',
                    4 => 'Complete',
                    default => '-',
                };

                // Approval level 1
                $approval1 = $booking->approvals->where('level', 1)->first();
                $approval1Status = $approval1 ? match($approval1->status) {
                    1 => 'Pending',
                    2 => 'Approved',
                    3 => 'Rejected',
                    default => '-',
                } : '-';
                $approval1Name = $approval1 && $approval1->approverUser ? $approval1->approverUser->nama : '-';

                // Approval level 2
                $approval2 = $booking->approvals->where('level', 2)->first();
                $approval2Status = $approval2 ? match($approval2->status) {
                    1 => 'Pending',
                    2 => 'Approved',
                    3 => 'Rejected',
                    default => '-',
                } : '-';
                $approval2Name = $approval2 && $approval2->approverUser ? $approval2->approverUser->nama : '-';

                // Fuel logs (misal total liter)
                $totalFuel = $booking->fuelLogs->sum('liter');
                $totalFuelCost = $booking->fuelLogs->sum('total');

                return [
                    'ID' => $booking->id_booking,
                    'Pemesan' => $booking->user->nama ?? '-',
                    'Kendaraan' => $booking->vehicle->nama_kendaraan ?? '-',
                    'Driver' => $booking->driver->nama_driver ?? '-',
                    'Tujuan' => $booking->tujuan,
                    'Tanggal Mulai' => $booking->tanggal_mulai,
                    'Tanggal Selesai' => $booking->tanggal_selesai,
                    'Status' => $statusText,
                    'Approval Level 1' => $approval1Status,
                    'Approver Level 1' => $approval1Name,
                    'Approval Level 2' => $approval2Status,
                    'Approver Level 2' => $approval2Name,
                    'Total Fuel (Liter)' => $totalFuel,
                    'Total Fuel Cost' => $totalFuelCost,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pemesan',
            'Kendaraan',
            'Driver',
            'Tujuan',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Status',
            'Approval Level 1',
            'Approver Level 1',
            'Approval Level 2',
            'Approver Level 2',
            'Total Fuel (Liter)',
            'Total Fuel Cost',
        ];
    }
}