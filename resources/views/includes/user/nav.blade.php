<nav class="container relative my-4 lg:my-10">
    <div class="flex flex-col justify-between w-full lg:flex-row lg:items-center">
        <!-- Logo & Toggler Button here -->
        <div class="flex items-center justify-between">
            <!-- LOGO -->
            <a href="{{ route('home') }}">
                <img src="{{ asset('user-assets/svg/logo.svg') }}" alt="stream" />
            </a>
            <!-- RESPONSIVE NAVBAR BUTTON TOGGLER -->
            <div class="block lg:hidden">
                <button class="p-1 outline-none mobileMenuButton" id="navbarToggler" data-target="#navigation">
                    <svg class="text-dark w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Nav Menu -->
        <div class="hidden w-full lg:block" id="navigation">
            <div class="flex flex-col items-baseline gap-4 mt-6 lg:justify-between lg:flex-row lg:items-center lg:mt-0">
                <div class="flex flex-col w-full ml-auto lg:w-auto gap-4 lg:gap-[50px] lg:items-center lg:flex-row">
                    <a href="{{ route('home') }}" class="nav-link-item active">Landing</a>
                    <a href="#!" class="nav-link-item">Catalog</a>
                    <a href="#!" class="nav-link-item">Benefits</a>
                    <a href="#!" class="nav-link-item">Stories</a>
                    <a href="#!" class="nav-link-item">Maps</a>
                </div>
                <div class="flex flex-col w-full ml-auto lg:w-auto lg:gap-12 lg:items-center lg:flex-row">
                    @guest
                        <a href="{{ route('login') }}" class="btn-secondary">
                            Log In
                        </a>
                    @endguest

                    @auth
                        <a href="javascript:void(0);"
                            class="flex flex-row-reverse lg:flex-row items-center justify-end lg:justify-start gap-[10px]"
                            onclick="toggleDropdown(this)">
                            <p class="text-base font-semibold text-dark">
                                Hello <br> {{ auth()->user()->name }}
                            </p>
                            <span class="p-1 rounded-full w-[55px] border-2 border-secondary">
                                <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : 'https://static.thenounproject.com/png/5034901-200.png' }}"
                                    class="w-full" alt="">
                            </span>
                        </a>

                        <div class="absolute bottom-0 lg:right-0 translate-y-[107%] z-50 w-max hidden"
                            id="userDropdownMenu">
                            <div class="border border-secondary rounded-[22px] bg-white p-[26px]">
                                <div class="flex flex-col gap-4">
                                    <a href="#!"
                                        class="text-base font-medium transition-all text-dark hover:underline underline-offset-2 decoration-1">
                                        My Transactions
                                    </a>
                                    <a href="#!"
                                        class="text-base font-medium transition-all text-dark hover:underline underline-offset-2 decoration-1">
                                        Rewards
                                    </a>
                                    <a href="#!"
                                        class="text-base font-medium transition-all text-dark hover:underline underline-offset-2 decoration-1">
                                        Add Benefit
                                    </a>
                                    <a href="#!"
                                        class="text-base font-medium transition-all text-dark hover:underline underline-offset-2 decoration-1">
                                        Payments
                                    </a>
                                    <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();"
                                        class="text-base font-medium transition-all text-dark hover:underline underline-offset-2 decoration-1">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
