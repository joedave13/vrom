@extends('layouts.user.app', ['title' => 'Booking Detail'])

@section('content')
    <!-- Main Content -->
    <section class="bg-darkGrey relative py-[70px]">
        <div class="container">
            <header class="mb-[30px]">
                <h2 class="font-bold text-dark text-[26px] mb-1">
                    Checkout & Drive Faster
                </h2>
                <p class="text-base text-secondary">We will help you get ready today</p>
            </header>

            <div class="flex items-center gap-5 lg:justify-between">
                <!-- Form Card -->
                <form id="booking-payment-form" action="{{ route('booking.update', $booking) }}" method="POST"
                    class="bg-white p-[30px] pb-10 rounded-3xl max-w-[490px] w-full">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col gap-[30px]">
                        <div class="flex flex-col gap-4">
                            <h5 class="text-lg font-semibold">
                                Review Order
                            </h5>
                            <!-- Items -->
                            <div class="flex items-center justify-between">
                                <p class="text-base font-normal">
                                    Car
                                </p>
                                <p class="text-base font-semibold">
                                    {{ $booking->car->name }}
                                </p>
                            </div>
                            <!-- Items -->
                            <div class="flex items-center justify-between">
                                <p class="text-base font-normal">
                                    Total day
                                </p>
                                <p class="text-base font-semibold">
                                    {{ $booking->start_date->diffInDays($booking->end_date) }}
                                </p>
                            </div>
                            <!-- Items -->
                            <div class="flex items-center justify-between">
                                <p class="text-base font-normal">
                                    Service
                                </p>
                                <p class="text-base font-semibold">
                                    Delivery
                                </p>
                            </div>
                            <!-- Items -->
                            <div class="flex items-center justify-between">
                                <p class="text-base font-normal">
                                    Price
                                </p>
                                <p class="text-base font-semibold">
                                    ${{ $booking->car->price }} per day
                                </p>
                            </div>
                            <!-- Items -->
                            <div class="flex items-center justify-between">
                                <p class="text-base font-normal">
                                    VAT (10%)
                                </p>
                                <p class="text-base font-semibold">
                                    ${{ $booking->vat }}
                                </p>
                            </div>
                            <!-- Items -->
                            <div class="flex items-center justify-between">
                                <p class="text-base font-normal">
                                    Grand total
                                </p>
                                <p class="text-base font-semibold">
                                    ${{ $booking->total_price }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <h5 class="text-lg font-semibold">
                                Payment Method
                            </h5>
                            <div class="grid md:grid-cols-2 gap-4 md:gap-[30px] items-center">
                                <div class="relative boxPayment">
                                    <input type="radio" value="MasterCard" name="payment_method" id="mastercard"
                                        class="absolute inset-0 z-50 opacity-0 cursor-pointer">
                                    <label for="mastercard"
                                        class="flex items-center justify-center gap-4 border border-grey rounded-[20px] p-5 min-h-[80px]">
                                        <img src="{{ asset('user-assets/svg/logo-mastercard.svg') }}" alt="">
                                        <p class="text-base font-semibold">
                                            MasterCard
                                        </p>
                                    </label>
                                </div>
                                <div class="relative boxPayment">
                                    <input type="radio" value="Midtrans" name="payment_method" id="midtrans"
                                        class="absolute inset-0 z-50 opacity-0 cursor-pointer">
                                    <label for="midtrans"
                                        class="flex items-center justify-center gap-4 border border-grey rounded-[20px] p-5 min-h-[80px]">
                                        <img src="{{ asset('user-assets/svg/logo-midtrans.svg') }}" alt="">
                                        <p class="text-base font-semibold">
                                            Midtrans
                                        </p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- CTA Button -->
                        <div class="col-span-2 mt-5">
                            <!-- Button Primary -->
                            <div class="p-1 rounded-full bg-primary group">
                                <a href="javascript:void(0)"
                                    onclick="document.getElementById('booking-payment-form').submit()" class="btn-primary">
                                    <p>
                                        Continue
                                    </p>
                                    <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <img src="{{ asset('user-assets/image/porsche_small.webp') }}"
                    class="max-w-[50%] hidden lg:block -mr-[100px]" alt="">
            </div>
        </div>
    </section>
@endsection
