@extends('layouts.user.auth', ['title' => 'Sign In'])

@section('content')
    <div class="container">
        <div class="flex flex-col items-center">
            <header class="mb-[30px] text-center">
                <h2 class="font-bold text-dark text-[26px] mb-1">
                    Sign In & Drive
                </h2>
                <p class="text-base text-secondary">We will help you get ready today</p>
            </header>
            <!-- Form Card -->
            <form id="login-form" action="{{ route('login') }}" method="POST"
                class="bg-white p-[30px] pb-10 rounded-3xl max-w-[490px] w-full">
                @csrf

                <div class="grid grid-cols-2 items-center gap-y-6 gap-x-4 lg:gap-x-[30px]">
                    <!-- Email -->
                    <div class="flex flex-col col-span-2 gap-3">
                        <label for="email" class="text-base font-semibold text-dark">
                            Email Address
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                            placeholder="Email Address...">

                        @if ($errors->has('email'))
                            <ul class="text-sm" style="color: #dc2626;">
                                @foreach ((array) $errors->get('email') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col col-span-2 gap-3">
                        <label for="password" class="text-base font-semibold text-dark">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                            placeholder="Password...">

                        @if ($errors->has('password'))
                            <ul class="text-sm" style="color: #dc2626;">
                                @foreach ((array) $errors->get('password') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <a href="#" class="mt-1 text-base text-right underline text-secondary underline-offset-2">
                            Forgot My Password
                        </a>
                    </div>
                    <!-- Sign In Button -->
                    <div class="col-span-2 mt-[26px]">
                        <!-- Button Primary -->
                        <div class="p-1 rounded-full bg-primary group">
                            <a href="javascript:void(0);" onclick="document.getElementById('login-form').submit();"
                                class="btn-primary">
                                <p>
                                    Sign In
                                </p>
                                <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Create New Account Button -->
                    <div class="col-span-2">
                        <a href="{{ route('register') }}" class="btn-secondary">
                            <p>Create New Account</p>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
