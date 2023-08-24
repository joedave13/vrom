<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Create New User') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Create new user for your car rent application.') }}
                        </p>
                    </header>

                    <section>
                        <form action="{{ route('admin.user.store') }}" method="POST" class="space-y-6"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        :value="old('name')" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                        :value="old('email')" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>

                                <div>
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" name="password" type="password"
                                        class="mt-1 block w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                </div>

                                <div>
                                    <x-input-label for="role" :value="__('Role')" />
                                    <select id="role" name="role"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                        <option value="" hidden>- Choose Role -</option>
                                        <option value="ADMIN" {{ old('brand') == 'ADMIN' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="USER" {{ old('brand') == 'USER' ? 'selected' : '' }}>
                                            User
                                        </option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('role')" />
                                </div>

                                <div>
                                    <x-input-label for="phone" :value="__('Phone Number')" />
                                    <x-text-input id="phone" name="phone" type="text"
                                        class="mt-1 block w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>

                                <div>
                                    <x-input-label for="avatar" :value="__('Avatar')" />
                                    <input type="file" id="avatar" name="avatar"
                                        class="mt-1 block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700-700
                                    hover:file:bg-indigo-100
                                " />
                                    <div class="shrink-0 mt-3 hidden" id="avatar-preview-section">
                                        <img id="avatar-preview" class="h-64 w-128 object-cover rounded-md"
                                            src="" alt="Avatar Preview" />
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        // create onchange event listener for featured_image input
        document.getElementById('avatar').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('avatar-preview-section').classList.remove('hidden')
                document.getElementById('avatar-preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
