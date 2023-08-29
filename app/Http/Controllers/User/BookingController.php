<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Booking\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function create(Car $car)
    {
        return view('pages.user.booking.create', compact('car'));
    }

    public function store(StoreBookingRequest $request, Car $car)
    {
        $data = $request->safe()->all();
        $data['code'] = "VROM-" . date('Ymd') . "-" . strtoupper(Str::random(5));
        $data['user_id'] = $request->user()->id;
        $data['start_date'] = Carbon::createFromFormat('d m Y', $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat('d m Y', $data['end_date']);

        $bookingDays = $data['start_date']->diffInDays($data['end_date']);

        $data['price'] = $car->price * $bookingDays;
        $data['vat'] = 0.1 * $data['price'];
        $data['total_price'] = $data['price'] + $data['vat'];

        $booking = $car->bookings()->create($data);

        return redirect()->route('booking.show', $booking);
    }

    public function show(Booking $booking)
    {
        $booking->load('car');

        return view('pages.user.booking.show', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }
}
