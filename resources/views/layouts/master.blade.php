<!doctype html>
<html lang="en" style="background-image: url(https://bakkar-trd.com/img/others/patterns_4.png);">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mindvalley | @yield('title')</title>
    <link rel="icon" type="image/png" href="https://tailwindcss.com/favicon-32x32.png"/>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('viewer-js/viewer.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
        span.invalid-feedback{
            color:#ea4343;
            font-size: 14px;
            line-height: 2;
        }
        .header-fixed{
            position: fixed;
            right: 0;
            left: 0;
            top: 0;
            z-index: 99;
        }
        .main-container{
            margin-top: 6em;;
        }
    </style>

    @yield('css')

</head>
<body>

    @include('parts.header')

    <div class="main-container">
        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{url('viewer-js/viewer.min.js')}}"></script>

    @yield('js')

</body>
</html>