<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} | VROM</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user-assets/css/main.css') }}">

    @stack('styles')
</head>

<body>
    @include('includes.user.nav')

    @yield('content')

    <footer class="py-10 md:pt-[100px] md:pb-[70px] container">
        <p class="text-base text-center text-secondary">
            All Rights Reserved. Copyright joedave13 {{ date('Y') }}.
        </p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 300,
            easing: 'ease-out'
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('user-assets/js/script.js') }}"></script>
    @stack('scripts')
</body>

</html>
