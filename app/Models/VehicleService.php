<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleService extends Model
{
    use HasFactory;

    protected $table = 'vehicle_services';
    protected $primaryKey = 'id_vehicle_service';
    const UPDATED_AT = null;

    protected $fillable = [
        'vehicle_id',
        'service_date',
        'keterangan',
        'cost',
        'status',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id_vehicle');
    }
}