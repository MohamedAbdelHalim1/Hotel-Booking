<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'status', 'type','price','hotel_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class , 'room_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class , 'hotel_id');
    }
}
