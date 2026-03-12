<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'approvals';
    protected $primaryKey = 'id_approval';
    public $timestamps = false; 

    protected $fillable = [
        'booking_id',
        'approver',
        'level',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id_booking');
    }

    public function approverUser()
    {
        return $this->belongsTo(User::class,'approver');
    }
}