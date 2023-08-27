<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <div class="flex mb-4">
                            <a href="{{ route('admin.booking.index') }}"
                                class="px-3 py-2 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                Go Back
                            </a>
                        </div>

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Detail Booking') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Detail booking that has been made by user.') }}
                        </p>
                    </header>

                    <section>
                        <div class="py-4 lg:py-7 flex justify-between">
                            <div>
                                <h5 class="mb-2 text-xl leading-none">
                                    Booking Code</h5>

                                <h6 class="font-extrabold leading-none text-purple-900">{{ $booking->code }}</h6>
                            </div>

                            <div class="text-right">
                                <h5 class="mb-2 text-xl leading-none">
                                    Booking Status</h5>

                                @include('pages.admin.booking.partials.booking-status')
                            </div>
                        </div>

                        <hr class="bg-gray-200 border-0 h-px">

                        <div class="flex py-4 lg:py-7">
                            <div class="flex-shrink-0 w-44">
                                <img src="{{ $booking->car->photos()->exists()? Storage::url($booking->car->photos()->inRandomOrder()->first()->url): 'https://static.thenounproject.com/png/5034901-200.png' }}"
                                    alt="car-img" class="object-contain rounded-lg">
                            </div>

                            <div class="ml-4">
                                <div class="flex flex-col h-full space-y-1">
                                    <div>
                                        <div class="font-medium text-gray-900 text-xl mb-1">
                                            {{ $booking->car->name }}
                                        </div>
                                        <div class="text-gray-800 text-sm">
                                            {{ $booking->car->brand->name }} • {{ $booking->car->type->name }}
                                        </div>
                                    </div>
                                    <div class="text-gray-500">
                                        <span class="text-gray-800 font-medium mr-1">Price
                                            :</span>${{ number_format($booking->car->price, 0, ',', '.') }}
                                    </div>
                                    <div class="text-gray-500">
                                        <span class="text-gray-800 font-medium mr-1">Rent Date :</span>
                                        <span>{{ $booking->start_date }} - {{ $booking->end_date }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="bg-gray-200 border-0 h-px">

                        <div class="grid justify-items-start grid-cols-2 py-4 lg:py-7">
                            <div>
                                <span class="font-medium text-gray-900 text-lg block">User Information</span>
                                <span class="block text-gray-600 mt-2">{{ $booking->name }}</span>
                                <span class="block text-gray-600">{{ $booking->user->email }}</span>
                                <span class="block text-gray-600">{{ $booking->user->phone }}</span>
                            </div>

                            <div>
                                <span class="font-medium text-gray-900 text-lg block">Shipping Information</span>
                                <span class="block text-gray-600 mt-2">{{ $booking->address }}</span>
                                <span class="block text-gray-600">{{ $booking->city }}</span>
                                <span class="block text-gray-600">{{ $booking->zip_code }}</span>
                            </div>
                        </div>

                        <hr class="bg-gray-200 border-0 h-px">

                        <div class="grid justify-items-start grid-cols-2 py-4 lg:py-7">
                            <div>
                                <span class="font-medium text-gray-900 text-lg block">Payment Information</span>

                                <span class="block text-gray-600 my-2">{{ $booking->payment_method }}</span>

                                <div class="mb-3">
                                    @include('pages.admin.booking.partials.payment-status')
                                </div>

                                <a href="{{ $booking->payment_url ? $booking->payment_url : '#' }}" target="_blank"
                                    class="px-3 py-2 text-gray-900 bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                    </svg>
                                    Go To Payment Link
                                </a>
                            </div>

                            <div>
                                <span class="font-medium text-gray-900 text-lg block">Shipping Method</span>
                                <span class="block text-gray-600 mt-2">VROM Delivery</span>
                                <span class="block text-gray-600">Takes from 15 minutes to 1 hour depending on the
                                    user's address</span>
                            </div>
                        </div>

                        <hr class="bg-gray-200 border-0 h-px">

                        <div class="grid justify-items-start grid-cols-2 py-4 lg:py-7">
                            <div class="w-full grid sm:grid-cols-2 gap-4 sm:gap-6">
                                <div>
                                    <span class="font-medium text-gray-900 text-lg block">Price</span>
                                    <span
                                        class="block font-extrabold text-gray-700 mt-1">${{ number_format($booking->price, 0, ',', '.') }}</span>
                                </div>

                                <div>
                                    <span class="font-medium text-gray-900 text-lg block">VAT</span>
                                    <span
                                        class="block font-extrabold text-gray-700 mt-1">${{ number_format($booking->vat, 0, ',', '.') }}</span>
                                </div>

                                <div>
                                    <span class="font-medium text-gray-900 text-lg block">Total Price</span>
                                    <span
                                        class="block font-extrabold text-green-700 mt-1">${{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div>
                                <form action="{{ route('admin.booking.update', $booking) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div>
                                            <x-input-label for="booking_status" :value="__('Booking Status')" />
                                            <select name="booking_status"
                                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                                <option value="" hidden>- Choose Booking Status -</option>
                                                <option value="Pending"
                                                    {{ $booking->booking_status == 'Pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="On Delivery"
                                                    {{ $booking->booking_status == 'On Delivery' ? 'selected' : '' }}>
                                                    On Delivery</option>
                                                <option value="On Rent"
                                                    {{ $booking->booking_status == 'On Rent' ? 'selected' : '' }}>On
                                                    Rent</option>
                                                <option value="Finished"
                                                    {{ $booking->booking_status == 'Finished' ? 'selected' : '' }}>
                                                    Finished</option>
                                                <option value="Cancel"
                                                    {{ $booking->booking_status == 'Cancel' ? 'selected' : '' }}>Cancel
                                                </option>
                                            </select>
                                        </div>

                                        <div>
                                            <x-input-label for="payment_status" :value="__('Payment Status')" />
                                            <select name="payment_status"
                                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                                <option value="" hidden>- Choose Payment Status -</option>
                                                <option value="Pending"
                                                    {{ $booking->payment_status == 'Pending' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="Success"
                                                    {{ $booking->payment_status == 'Success' ? 'selected' : '' }}>
                                                    Success</option>
                                                <option value="Failed"
                                                    {{ $booking->payment_status == 'Failed' ? 'selected' : '' }}>Failed
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 mt-3">
                                        <x-primary-button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            {{ __('Update Status') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
