<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::query()->latest()->take(4)->get();

        return view('pages.user.home', compact('cars'));
    }
}
