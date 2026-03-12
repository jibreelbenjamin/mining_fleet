<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';
    protected $primaryKey = 'id_driver';
    public $timestamps = false; 

    protected $fillable = [
        'nama_driver',
        'jenis_kelamin',
        'alamat',
        'telepon',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}