<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Create New Photo') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Create new car photo for your car rent application.') }}
                        </p>
                    </header>

                    <section>
                        <form action="{{ route('admin.car.photo.store', $car) }}" method="POST" class="space-y-6"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div>
                                    <x-input-label for="photo" :value="__('Photo URL')" />
                                    <input type="file" id="photo" name="photo"
                                        class="mt-1 block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700-700
                                    hover:file:bg-indigo-100
                                " />
                                    <div class="shrink-0 mt-3 hidden" id="photo-preview-section">
                                        <img id="photo-preview" class="h-64 w-128 object-cover rounded-md"
                                            src="" alt="Photo Preview" />
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('photo')" />
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
        document.getElementById('photo').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('photo-preview-section').classList.remove('hidden')
                document.getElementById('photo-preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
