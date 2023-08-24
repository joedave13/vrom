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
                                    <div class="flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg aria-hidden="true" id="star{{ $i }}"
                                                class="w-5 h-5 {{ $i <= $car->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                        <span class="ml-1">{{ number_format($car->rating, 2, ',', '') }}</span>
                                    </div>
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
        @include('pages.admin.feature.index')
        {{-- End --}}
    </div>

</x-app-layout>
