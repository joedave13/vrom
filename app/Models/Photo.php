<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'url'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
