@extends('layouts.user.app', ['title' => 'Car Detail'])

@section('content')
    <div>
        <section class="bg-darkGrey relative py-[70px]">
            <div class="container">
                <!-- Breadcrumb -->
                <ul class="flex items-center gap-5 mb-[50px]">
                    <li
                        class="text-secondary font-normal text-base capitalize after:content-['/'] last:after:content-none inline-flex gap-5">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li
                        class="text-secondary font-normal text-base capitalize after:content-['/'] last:after:content-none inline-flex gap-5">
                        <a href="#!">{{ $car->brand->name }}</a>
                    </li>
                    <li
                        class="text-dark font-semibold text-base capitalize after:content-['/'] last:after:content-none inline-flex gap-5">
                        Details
                    </li>
                </ul>

                <div class="grid grid-cols-12 gap-[30px]">
                    <!-- Car Preview -->
                    <div class="col-span-12 lg:col-span-8">
                        <div class="bg-white p-4 rounded-[30px] flex flex-col gap-4" id="gallery">
                            <img :src="thumbnails[activeThumbnail].url" :key="thumbnails[activeThumbnail].id"
                                class="md:h-[490px] rounded-[18px] h-auto w-full" alt="">
                            <div class="grid items-center grid-cols-4 gap-3 md:gap-5">
                                <div v-for="(thumbnail, index) in thumbnails" :key="thumbnail.id">
                                    <a href="#!" @click="changeActive(index)">
                                        <img :src="thumbnail.url" alt="" class="thumbnail"
                                            :class="{ selected: index == activeThumbnail }">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="col-span-12 md:col-start-5 lg:col-start-auto md:col-span-8 lg:col-span-4">
                        <div class="bg-white p-5 pb-[30px] rounded-3xl h-full">
                            <div class="flex flex-col h-full divide-y divide-grey">
                                <!-- Name, Category, Rating -->
                                <div class="max-w-[230px] pb-5">
                                    <h1 class="font-bold text-[28px] leading-[42px] text-dark mb-[6px]">
                                        Porsche Taycan Mattic 67S
                                    </h1>
                                    <p class="text-secondary font-normal text-base mb-[10px]">Sport Car</p>
                                    <div class="flex items-center gap-2">
                                        <span class="flex items-center gap-1">
                                            @for ($i = 1; $i <= $car->rating; $i++)
                                                <img src="{{ asset('user-assets/svg/ic-star.svg') }}"
                                                    class="h-[22px] w-[22px]" alt="">
                                            @endfor
                                        </span>
                                        <p class="text-base font-semibold text-dark mt-[2px]">
                                            {{ $car->rating }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Features -->
                                <ul class="flex flex-col gap-4 flex-start pt-5 pb-[25px]">
                                    @foreach ($car->features as $feature)
                                        <li class="flex items-center gap-3 text-base font-semibold text-dark">
                                            <img src="{{ asset('user-assets/svg/ic-checkDark.svg') }}" alt="">
                                            {{ $feature->description }}
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Price, CTA Button -->
                                <div class="flex items-center justify-between gap-4 pt-5 mt-auto">
                                    <div>
                                        <p class="font-bold text-dark text-[22px]">
                                            ${{ $car->price }}
                                        </p>
                                        <p class="text-base font-normal text-secondary">
                                            /day
                                        </p>
                                    </div>
                                    <div class="w-full max-w-[70%]">
                                        <!-- Button Primary -->
                                        <div class="p-1 rounded-full bg-primary group">
                                            <a href="checkout.html" class="btn-primary">
                                                <p>
                                                    Rent Now
                                                </p>
                                                <img src="{{ asset('user-assets/svg/ic-arrow-right.svg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('includes.user.faq')
    </div>

    @push('scripts')
        <script src="https://unpkg.com/vue@next/dist/vue.global.js"></script>
        <script>
            const {
                createApp
            } = Vue
            createApp({
                data() {
                    return {
                        activeThumbnail: 0,
                        thumbnails: [
                            @foreach (json_decode($car->photos) as $key => $photo)
                                {
                                    id: {{ $key }},
                                    url: "{{ Storage::url($photo->url) }}"
                                },
                            @endforeach
                        ],
                    }
                },
                methods: {
                    changeActive(id) {
                        this.activeThumbnail = id;
                    }
                }
            }).mount('#gallery')
        </script>
    @endpush
@endsection
