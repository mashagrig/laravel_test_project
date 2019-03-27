@include('layouts.app')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $titleMain }}
        @stack('titleCurrent')
    </title>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}

    {{--<!-- подключение css-файла -->--}}
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"--}}
          {{--integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">--}}


    <!-- подключение нужной версии jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    {{--<!-- подключение popper.js, необходимого для корректной работы некоторых плагинов Bootstrap 4 -->--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"--}}
            {{--integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">--}}
    {{--</script>--}}

    {{--<!-- подключение js-файла -->--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"--}}
            {{--integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">--}}
    {{--</script>--}}
{{--<script src="purify.min.js"></script>--}}
{{--<script	src="popper.min.js"></script>--}}
    {{--<!-- Fonts -->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">--}}


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

{{-------------------BODY--------------------}}

<body>

{{--@yield('main')--}}
<div class="flex-center position-ref full-height">
    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
                {{--@auth--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--@else--}}
                {{--<a href="{{ route('login') }}">Login</a>--}}

                {{--@if (Route::has('register'))--}}
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                {{--@endif--}}
            {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="content">

        {{--<div class="title m-b-md">--}}
        <div class="content">
          <h1>Laravel</h1>
        </div>

        <div class="content">
            @yield("gym")
        </div>

        {{--<div class="links">--}}
        {{--</div>--}}
    </div>
</div>
</body>

</html>

