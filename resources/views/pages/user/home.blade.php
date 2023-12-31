@extends('layouts.user.app', ['title' => 'Home'])

@section('content')
    <div>
        <!-- Hero -->
        <section class="container relative pb-[100px] pt-[30px]">
            <div class="flex flex-col items-center justify-center gap-[30px]">
                <!-- Preview Image -->
                <div class="relative">
                    <div class="absolute z-0 hidden lg:block">
                        <div class="font-extrabold text-[220px] text-darkGrey tracking-[-0.06em] leading-[101%]">
                            <div data-aos="fade-right" data-aos-delay="300">
                                NEW
                            </div>
                            <div data-aos="fade-left" data-aos-delay="600">
                                PORSCHE
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('user-assets/image/porsche.webp') }}" class="w-full max-w-[963px] z-10 relative"
                        alt="" data-aos="zoom-in" data-aos-delay="950">
                </div>

                <div class="flex flex-col lg:flex-row items-center justify-around lg:gap-[60px] gap-7">
                    <!-- Car Details -->
                    <div class="flex items-center gap-y-12">
                        <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left"
                            data-aos-delay="1400">
                            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
                                380
                            </h6>
                            <p class="text-sm font-normal text-center md:text-base text-secondary">
                                Horse Power
                            </p>
                        </div>
                        <span class="vr" data-aos="fade-left" data-aos-delay="1600"></span>
                        <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left"
                            data-aos-delay="1900">
                            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
                                12S
                            </h6>
                            <p class="text-sm font-normal text-center md:text-base text-secondary">
                                Speed AT
                            </p>
                        </div>
                        <span class="vr" data-aos="fade-left" data-aos-delay="2100"></span>
                        <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left"
                            data-aos-delay="2400">
                            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
                                AWD
                            </h6>
                            <p class="text-sm font-normal text-center md:text-base text-secondary">
                                Drive
                            </p>
                        </div>
                        <span class="vr" data-aos="fade-left" data-aos-delay="2600"></span>
                        <div class="flex flex-col items-center gap-[2px] px-3 md:px-10" data-aos="fade-left"
                            data-aos-delay="2900">
                            <h6 class="font-bold text-dark text-xl md:text-[26px] text-center">
                                A.I
                            </h6>
                            <p class="text-sm font-normal text-center md:text-base text-secondary">
                                Tracking
                            </p>
                        </div>
                    </div>
                    <!-- Button Primary -->
                    <div class="p-1 rounded-full bg-primary group" data-aos="zoom-in" data-aos-delay="3400">
                        <a href="checkout.html" class="btn-primary">
                            <p>
                                Rent Now
                            </p>
                            <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Cars -->
        <section class="bg-darkGrey">
            <div class="container relative py-[100px]">
                <header class="mb-[30px]">
                    <h2 class="font-bold text-dark text-[26px] mb-1">
                        Popular Cars
                    </h2>
                    <p class="text-base text-secondary">Start your big day</p>
                </header>

                <!-- Cars -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-[29px]">
                    @foreach ($cars as $car)
                        <!-- Card -->
                        <div class="card-popular">
                            <div>
                                <h5 class="text-lg text-dark font-bold mb-[2px] whitespace-nowrap">
                                    {{ $car->name }}
                                </h5>
                                <p class="text-sm font-normal text-dark">{{ $car->brand->name }}</p>
                                <p class="text-sm font-normal text-secondary">{{ $car->type->name }}</p>
                                <a href="{{ route('car.show', $car->slug) }}" class="absolute inset-0"></a>
                            </div>
                            <img src="{{ $car->photos()->exists()? Storage::url($car->photos()->inRandomOrder()->first()->url): 'https://static.thenounproject.com/png/5034901-200.png' }}"
                                class="rounded-[18px] min-w-[216px] w-full h-[150px]" alt="">
                            <div class="flex items-center justify-between gap-1">
                                <!-- Price -->
                                <p class="text-sm font-normal text-secondary">
                                    <span class="text-base font-bold text-primary">${{ $car->price }}</span>/day
                                </p>
                                <!-- Rating -->
                                <p class="text-dark text-xs font-semibold flex items-center gap-[2px]">
                                    ({{ $car->rating }}/5)
                                    <img src="{{ asset('user-assets/svg/ic-star.svg') }}" alt="">
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Extra Benefits -->
        <section class="container relative pt-[100px]">
            <div class="flex items-center flex-col md:flex-row flex-wrap justify-center gap-8 lg:gap-[120px]">
                <img src="{{ asset('user-assets/image/illustration-01.webp') }}" class="w-full lg:max-w-[536px]"
                    alt="">
                <div class="max-w-[268px] w-full">
                    <div class="flex flex-col gap-[30px]">
                        <header>
                            <h2 class="font-bold text-dark text-[26px] mb-1">
                                Extra Benefits
                            </h2>
                            <p class="text-base text-secondary">You drive safety and famous</p>
                        </header>
                        <!-- Benefits Item -->
                        <div class="flex items-center gap-4">
                            <div class="bg-dark rounded-[26px] p-[19px]">
                                <img src="{{ asset('user-assets/svg/ic-car.svg') }}" alt="">
                            </div>
                            <div>
                                <h5 class="text-lg text-dark font-bold mb-[2px]">
                                    Delivery
                                </h5>
                                <p class="text-sm font-normal text-secondary">Just sit tight and wait</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-dark rounded-[26px] p-[19px]">
                                <img src="{{ asset('user-assets/svg/ic-card.svg') }}" alt="">
                            </div>
                            <div>
                                <h5 class="text-lg text-dark font-bold mb-[2px]">
                                    Pricing
                                </h5>
                                <p class="text-sm font-normal text-secondary">12x Pay Installment</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-dark rounded-[26px] p-[19px]">
                                <img src="{{ asset('user-assets/svg/ic-securityuser.svg') }}" alt="">
                            </div>
                            <div>
                                <h5 class="text-lg text-dark font-bold mb-[2px]">
                                    Secure
                                </h5>
                                <p class="text-sm font-normal text-secondary">Use your plate number</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-dark rounded-[26px] p-[19px]">
                                <img src="{{ asset('user-assets/svg/ic-convert3dcube.svg') }}" alt="">
                            </div>
                            <div>
                                <h5 class="text-lg text-dark font-bold mb-[2px]">
                                    Fast Trade
                                </h5>
                                <p class="text-sm font-normal text-secondary">Change car faster</p>
                            </div>
                        </div>
                    </div>
                    <!-- CTA Button -->
                    <div class="mt-[50px]">
                        <!-- Button Primary -->
                        <div class="p-1 rounded-full bg-primary group">
                            <a href="#!" class="btn-primary">
                                <p>
                                    Explore Cars
                                </p>
                                <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('includes.user.faq')

        <!-- Instant Booking -->
        <section class="relative bg-[#060523]">
            <div class="container py-20">
                <div class="flex flex-col">
                    <header class="mb-[50px] max-w-[360px] w-full">
                        <h2 class="font-bold text-white text-[26px] mb-4">
                            Drive Yours Today. <br>
                            Drive Faster.
                        </h2>
                        <p class="text-base text-subtlePars">Get an instant booking to catch up whatever your
                            really want to achieve today, yes.</p>
                    </header>
                    <!-- Button Primary -->
                    <div class="p-1 rounded-full bg-primary group w-max">
                        <a href="details.html" class="btn-primary">
                            <p>
                                Book Now
                            </p>
                            <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="absolute bottom-[-30px] right-0 lg:w-[764px] max-h-[332px] hidden lg:block">
                    <img src="{{ asset('user-assets/image/porsche_small.webp') }}" alt="">
                </div>
            </div>
        </section>
    </div>
@endsection
