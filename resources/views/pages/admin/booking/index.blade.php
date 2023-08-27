<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="p-4 bg-white border-b border-gray-200">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
                            {{-- Search Form --}}
                            <div class="w-full md:w-1/2">
                                <form action="{!! url()->current() !!}" method="GET" class="flex items-center"
                                    autocomplete="off">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="text" name="search" id="simple-search"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                            placeholder="Search" value="{{ old('search') }}">
                                        <input type="submit" hidden>
                                    </div>
                                </form>
                            </div>
                            {{-- End --}}
                        </div>

                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Booking Date
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        User
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Car
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Rent Date
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Total Price
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Booking Status
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Payment Status
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse ($bookings as $booking)
                                                    <tr>
                                                        <th scope="row"
                                                            class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-900">
                                                            {{ $booking->created_at }}
                                                        </th>
                                                        <td
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-left">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-10 w-10">
                                                                    <img src="{{ $booking->user->avatar ? Storage::url($booking->user->avatar) : 'https://static.thenounproject.com/png/5034901-200.png' }}"
                                                                        alt="user-img"
                                                                        class="h-10 w-10 rounded-full object-contain">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $booking->name }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $booking->user->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-left">
                                                            <div>
                                                                <div class="font-bold text-sm text-gray-900">
                                                                    {{ $booking->car->name }}
                                                                </div>
                                                                <div class="text-sm text-gray-500">
                                                                    {{ $booking->car->brand->name }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            <div class="flex flex-col">
                                                                <span>{{ $booking->start_date->toDateString() }}
                                                                    -</span>
                                                                <span>{{ $booking->end_date->toDateString() }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            ${{ $booking->total_price }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @include('pages.admin.booking.partials.booking-status')
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @include('pages.admin.booking.partials.payment-status')
                                                        </td>
                                                        <td class="px-6 py-4 flex justify-end gap-x-1">
                                                            <a href="{{ route('admin.booking.show', $booking) }}"
                                                                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4 mr-2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                                </svg>
                                                                Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7"
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-500 text-center">
                                                            No Data
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        {{ $bookings->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
