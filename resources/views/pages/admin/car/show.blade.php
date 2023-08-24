<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Car') }}
        </h2>
    </x-slot>

    {{-- Detail --}}
    <div class="pt-12 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <div class="flex mb-4 space-x-1">
                            <a href="{{ route('admin.car.index') }}"
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
                            {{ __('Detail Car') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Detail information about a car.') }}
                        </p>
                    </header>

                    <section class="mt-10">
                        <div class="space-y-6">
                            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <p class="text-gray-500">{{ $car->name }}</p>
                                </div>

                                <div>
                                    <x-input-label for="slug" :value="__('Slug')" />
                                    <p class="text-gray-500">{{ $car->slug }}</p>
                                </div>

                                <div>
                                    <x-input-label for="brand" :value="__('Brand')" />
                                    <p class="text-gray-500">{{ $car->brand->name }}</p>
                                </div>

                                <div>
                                    <x-input-label for="type" :value="__('Type')" />
                                    <p class="text-gray-500">{{ $car->type->name }}</p>
                                </div>

                                <div>
                                    <x-input-label for="type" :value="__('Price')" />
                                    <p class="text-gray-500">${{ $car->price }}</p>
                                </div>

                                <div>
                                    <x-input-label for="type" :value="__('Rating')" />
                                    <p class="text-gray-500">{{ $car->rating }}</p>
                                </div>

                                <div>
                                    <x-input-label for="created_at" :value="__('Created At')" />
                                    <p class="text-gray-500">{{ $car->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}

    <div class="pb-12 grid gap-4 sm:grid-cols-2 sm:gap-6">
        {{-- Picture --}}
        @include('pages.admin.photo.index')
        {{-- End --}}

        {{-- Feature --}}
        <div class="max-w-7xl sm:pr-10 lg:pr-36">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Car Feature') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('All features about the car.') }}
                        </p>
                    </header>

                    <section>
                        <div
                            class="flex flex-col md:flex-row items-center justify-end space-y-3 md:space-y-0 md:space-x-4 py-4">
                            {{-- Create Feture Button --}}
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ route('admin.car.create') }}"
                                    class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Add Feature
                                </a>
                            </div>
                            {{-- End --}}
                        </div>

                        {{-- Car Feature Table --}}
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Feature
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td colspan="2"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-500 text-center">
                                                        No Data
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End --}}
                    </section>
                </div>
            </div>
        </div>
        {{-- End --}}
    </div>

</x-app-layout>
