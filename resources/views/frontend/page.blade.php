@extends('layouts.frontend')
@section('css')
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('front/css/Terms.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('front/css/privacy&termsAR.css') }}">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap');
            *{
                font-family: 'Cairo', sans-serif !important;
            }
            
        </style>

    @endif
@endsection
@section('content')
    <div class="main">

        <div class="img-main">
            <img src="{{ asset('uploads/' . $page->image) }}" class="wow animate__fadeInUp" data-wow-delay=".7s">
            <!-- <div class="overlay"></div> -->
        </div>

        <div class="main-content">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                    </ol>
                </nav>
                <h1 class="wow animate__fadeInUp" data-wow-delay=".7s">{{ $page->title }}</h1>
                <div class="rowContent wow animate__fadeInUp" data-wow-delay=".7s">
                    <p>{!! $page->dec !!}
                    </p>
                </div>


            </div>
        </div>
    </div>
@endsection
