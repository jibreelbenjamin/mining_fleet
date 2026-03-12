<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelLog extends Model
{
    use HasFactory;

    protected $table = 'fuel_logs';
    protected $primaryKey = 'id_fuel_log';
    public $timestamps = false; 

    protected $fillable = [
        'booking_id',
        'liter',
        'harga_per_liter',
        'total',
        'tanggal'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}