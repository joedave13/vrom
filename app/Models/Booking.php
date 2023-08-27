<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'user_id', 'name', 'start_date', 'end_date', 'address', 'city', 'zip_code', 'car_id', 'price', 'vat', 'total_price', 'booking_status', 'payment_method', 'payment_url', 'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
