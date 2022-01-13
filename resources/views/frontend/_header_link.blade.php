<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link  href="{{ asset('front/libs/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link  href="{{ asset('front/libs/WOW-master/WOW-master/css/libs/animate.css') }}" />
    <base href="/">
@if(app()->getLocale() =='en')
    <link  type="text/css" href="{{ asset('front/css/StyleMain.css') }}">
    @else
    <link  type="text/css" href="{{ asset('front/css/StyleMainAr.css') }}">
    @endif
    {{-- <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script> --}}
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <link  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Home</title>
    @yield('css')
</head>

<body>
