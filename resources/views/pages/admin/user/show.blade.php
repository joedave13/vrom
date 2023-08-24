<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail User') }}
        </h2>
    </x-slot>

    {{-- Detail --}}
    <div class="pt-12 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <div class="flex mb-4 space-x-1">
                            <a href="{{ route('admin.user.index') }}"
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
                            {{ __('Detail User') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Detail information about a user.') }}
                        </p>
                    </header>

                    <section class="mt-10">
                        <div class="space-y-6">
                            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <p class="text-gray-500">{{ $user->name }}</p>
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email Address')" />
                                    <p class="text-gray-500">{{ $user->email }}</p>
                                </div>

                                <div>
                                    <x-input-label for="role" :value="__('Role')" />
                                    <p class="mt-1">
                                        {!! $user->role == 'USER'
                                            ? '<span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">User</span>'
                                            : '<span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Admin</span>' !!}
                                    </p>
                                </div>

                                <div>
                                    <x-input-label for="phone" :value="__('Phone')" />
                                    <p class="text-gray-500">{{ $user->phone ?? '-' }}</p>
                                </div>

                                <div>
                                    <x-input-label for="avatar" :value="__('Avatar')" />
                                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://static.thenounproject.com/png/5034901-200.png' }}"
                                        alt="user-img" class="w-28 h-28 rounded-full object-contain mt-2">
                                </div>

                                <div>
                                    <x-input-label for="created_at" :value="__('Created At')" />
                                    <p class="text-gray-500">{{ $user->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
</x-app-layout>
