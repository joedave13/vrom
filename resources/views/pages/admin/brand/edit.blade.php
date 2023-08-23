<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Brand') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Edit Brand') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Edit brand information in your car rent application.') }}
                        </p>
                    </header>

                    <section>
                        <form action="{{ route('admin.brand.update', $brand) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        :value="old('name', $brand->name)" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
