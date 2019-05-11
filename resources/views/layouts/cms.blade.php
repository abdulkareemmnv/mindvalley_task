<!doctype html>
<html lang="en" style="background-image: url(https://bakkar-trd.com/img/others/patterns_4.png);">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mindvalley || @yield('title')</title>
    <link rel="icon" type="image/png" href="https://tailwindcss.com/favicon-32x32.png"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('viewer-js/viewer.min.css')}}">
    <link rel="stylesheet" href="{{url('taggle/taggle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('filepond/filepond.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('filepond/filepond-plugin-image-preview.min.css')}}"/>

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
        span.invalid-feedback ,label.error{
            color:#ea4343;
            font-size: 14px;
            line-height: 2;
        }
        body{
            background: transparent;
        }
        .ui-autocomplete{
            z-index: 9999;
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

    <script src="{{url('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('viewer-js/viewer.min.js')}}"></script>
    <script type="text/javascript" src="{{url('taggle/taggle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('taggle/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{url('filepond/filepond.min.js')}}"></script>
    <script type="text/javascript" src="{{url('filepond/filepond.jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('filepond/filepond-plugin-image-preview.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>

    <script type="text/javascript" src="{{url('plugins/ckeditor/ckeditor.js')}}"></script>

    <script>
        //-------------------------------------------------------------------//
    </script>

    @yield('js')

</body>
</html>