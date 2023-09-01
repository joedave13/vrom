@extends('layouts.user.app')

@section('content')
    <section class="bg-darkGrey relative py-[70px] min-h-[calc(100vh-70px)] lg:min-h-[calc(100vh-135px)]">
        <div class="container">
            <div class="flex items-center justify-center gap-5 lg:justify-between">
                <div class="flex flex-col items-center md:ml-12">
                    <header class="mb-[30px] text-center">
                        <h2 class="font-bold text-dark text-[26px] mb-1">
                            Success Booking
                        </h2>
                        <p class="text-base text-secondary">We will email you the confirmation <br>
                            and the next instructions</p>
                    </header>
                    <!-- Button Primary -->
                    <div class="p-1 rounded-full bg-primary group w-[220px]">
                        <a href="{{ url('/') }}" class="btn-primary">
                            <p>
                                My Dashboard
                            </p>
                            <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <img src="{{ asset('user-assets/image/porsche_small.webp') }}"
                    class="max-w-[50%] hidden lg:block -mr-[100px]" alt="">
            </div>
        </div>
    </section>
@endsection
