<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function callback(Request $request)
    {
        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $fraud = $notification->fraud_status;
        $bookingCode = $notification->order_id;

        $booking = Booking::query()->where('code', $bookingCode)->first();

        if ($transactionStatus == 'capture') {
            if ($fraud == 'challenge') {
                $booking->payment_status = 'Pending';
                $booking->booking_status = 'Pending';
            } else if ($fraud == 'accept') {
                $booking->payment_status = 'Success';
                $booking->booking_status = 'On Delivery';
            }
        } else if ($transactionStatus == 'cancel') {
            if ($fraud == 'challenge') {
                $booking->payment_status = 'Failed';
                $booking->booking_status = 'Cancel';
            } else if ($fraud == 'accept') {
                $booking->payment_status = 'Failed';
                $booking->booking_status = 'Cancel';
            }
        } else if ($transactionStatus == 'deny') {
            $booking->payment_status = 'Failed';
            $booking->booking_status = 'Cancel';
        } else if ($transactionStatus == 'settlement') {
            $booking->payment_status = 'Success';
            $booking->booking_status = 'On Delivery';
        } else if ($transactionStatus == 'pending') {
            $booking->payment_status = 'Pending';
            $booking->booking_status = 'Pending';
        } else if ($transactionStatus == 'expire') {
            $booking->payment_status = 'Failed';
            $booking->booking_status = 'Cancel';
        } else {
            $booking->payment_status = 'Pending';
            $booking->booking_status = 'Pending';;
        }

        $booking->save();

        return response()->json([
            'status' => true,
            'message' => 'Payment success!'
        ]);
    }
}
