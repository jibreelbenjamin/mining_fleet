<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'id_booking';
    public $timestamps = false; 

    protected $fillable = [
        'requested_by',
        'vehicle_id',
        'driver_id',
        'tujuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'requested_by', 'id_user');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id_vehicle');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id_driver');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class, 'booking_id', 'id_booking');
    }

    public function fuelLogs()
    {
        return $this->hasMany(FuelLog::class, 'booking_id', 'id_booking');
    }
}