<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id_vehicle';
    public $timestamps = false; 

    protected $fillable = [
        'nama_kendaraan',
        'jenis_kendaraan',
        'plat_nomor',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function services()
    {
        return $this->hasMany(VehicleService::class);
    }
}