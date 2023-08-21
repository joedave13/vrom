<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'start_date', 'end_date', 'address', 'city', 'zip_code', 'car_id', 'price', 'vat', 'total_price', 'booking_status', 'payment_method', 'payment_status'
    ];
}
