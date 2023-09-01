<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Booking\StoreBookingRequest;
use App\Http\Requests\User\Booking\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class BookingController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

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

    public function update(UpdateBookingRequest $request, Booking $booking)
    {

        if ($request->payment_method == 'Midtrans') {
            $data = $request->safe()->all();

            $response = Http::get('https://api.exchangerate-api.com/v4/latest/USD');
            $body = $response->body();
            $rate = json_decode($body)->rates->IDR;

            $totalPriceInIDR = $booking->total_price * $rate;

            $params = [
                'transaction_details' => [
                    'order_id' => $booking->code,
                    'gross_amount' => (int) $totalPriceInIDR
                ],
                'customer_details' => [
                    'first_name' => $booking->user->name,
                    'email' => $booking->user->email,
                ],
            ];

            $data['payment_url'] = Snap::createTransaction($params)->redirect_url;

            $booking->update($data);

            return redirect($data['payment_url']);
        }

        return redirect('/');
    }

    public function success()
    {
        return view('pages.user.booking.success');
    }
}
