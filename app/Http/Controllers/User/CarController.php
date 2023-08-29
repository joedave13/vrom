<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show(Car $car)
    {
        return view('pages.user.car.show', compact('car'));
    }
}
