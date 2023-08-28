@extends('layouts.user.auth', ['title' => 'Sign Up'])

@section('content')
    <section class="bg-darkGrey relative py-[70px]">
        <div class="container">
            <div class="flex flex-col items-center">
                <header class="mb-[30px] text-center">
                    <h2 class="font-bold text-dark text-[26px] mb-1">
                        Sign Up & Drive
                    </h2>
                    <p class="text-base text-secondary">Start join us and enjoy our ride</p>
                </header>
                <!-- Form Card -->
                <form id="register-form" action="{{ route('register') }}" method="POST"
                    class="bg-white p-[30px] pb-10 rounded-3xl max-w-[490px] w-full" id="uploadForm"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- User Photo -->
                    <div class="mb-[50px] flex justify-center">
                        <div class="relative">
                            <img src="{{ asset('user-assets/svg/ic-default-photo.svg') }}"
                                class="w-[120px] h-[120px] rounded-full" alt="Profile Picture" id="imageSrc">

                            <a href="javascript:void(0);" id="btnUploadPhoto" class="">
                                <img src="{{ asset('user-assets/svg/ic-btn_upload.svg') }}"
                                    class="w-[36px] h-[36px] rounded-full absolute right-[-7px] bottom-[9px]"
                                    alt="Upload Profile Picture Button">
                            </a>
                            <a href="javascript:void(0);" id="btnDeletePhoto" class="hidden">
                                <img src="{{ asset('user-assets/svg/ic-btn_delete.svg') }}"
                                    class="w-[36px] h-[36px] rounded-full absolute right-[-7px] bottom-[9px]"
                                    alt="Delete Profile Picture Button">
                            </a>
                        </div>
                        <input type="file" name="avatar" id="photo" class="hidden" value=""
                            accept="image/x-png,image/jpg,image/jpeg">
                    </div>
                    <div class="grid grid-cols-2 items-center gap-y-6 gap-x-4 lg:gap-x-[30px]">
                        <!-- Full Name -->
                        <div class="flex flex-col col-span-2 gap-3">
                            <label for="name" class="text-base font-semibold text-dark">
                                Full Name
                            </label>
                            <input type="text" name="name" id="name"
                                class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                                placeholder="Full name..." value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <ul class="text-sm" style="color: #dc2626;">
                                    @foreach ((array) $errors->get('name') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Phone Number -->
                        <div class="flex flex-col col-span-2 gap-3">
                            <label for="phone" class="text-base font-semibold text-dark">
                                Phone Number
                            </label>
                            <input type="number" name="phone" id="phone"
                                class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                                placeholder="Phone number..." value="{{ old('phone') }}">

                            @if ($errors->has('phone'))
                                <ul class="text-sm" style="color: #dc2626;">
                                    @foreach ((array) $errors->get('phone') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col col-span-2 gap-3">
                            <label for="email" class="text-base font-semibold text-dark">
                                Email Address
                            </label>
                            <input type="email" name="email" id="email"
                                class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                                placeholder="Email address..." value="{{ old('email') }}">

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
                        </div>

                        <!-- Password Confirmation -->
                        <div class="flex flex-col col-span-2 gap-3">
                            <label for="password_confirmation" class="text-base font-semibold text-dark">
                                Password Confirmation
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                                placeholder="Password confirmation...">
                        </div>

                        <!-- Button -->
                        <div class="col-span-2 mt-[26px]">
                            <!-- Button Primary -->
                            <div class="p-1 rounded-full bg-primary group">
                                <a href="javascript:void(0);" onclick="document.getElementById('register-form').submit();"
                                    class="btn-primary">
                                    <p>
                                        Create My Account
                                    </p>
                                    <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Create New Account Button -->
                        <div class="col-span-2">
                            <a href="{{ route('login') }}" class="btn-secondary">
                                <p>Sign In</p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
