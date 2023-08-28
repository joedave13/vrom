<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} | VROM</title>

    <link rel="stylesheet" href="{{ asset('user-assets/css/main.css') }}">
</head>

<body>
    @include('includes.user.navbar')

    <!-- Main Content -->
    <section class="bg-darkGrey relative py-[70px]">
        @yield('content')
    </section>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('user-assets/js/script.js') }}"></script>
</body>

</html>
