@extends('layouts.frontend')
@section('css')
@if (app()->getLocale() == 'en')
<link rel="stylesheet" href="{{ asset('user_dash/css/mids.css') }}">

@else
<link rel="stylesheet" href="{{ asset('user_dash/css/midsAr.css') }}">

@endif
@endsection
@section('content')

<div class="main">


    <div class="img-main" style="text-align: center">
        <img src="{{ asset('front/imgs/new_message.svg') }}" class="wow animate__fadeInUp"data-wow-delay=".7s">
        <!-- <div class="overlay"></div> -->
    </div>

    <div class="main-content">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page" >{{ __('Contact Us') }}</li>
                </ol>
            </nav>
                    <h1 class="wow animate__fadeInUp" data-wow-delay=".7s">{{ __('Contact Us') }}</h1>
            
        <div class="contact-box rounded wow animate__fadeInUp"data-wow-delay=".7s">
            @include('inc.alerts.error')
            @include('inc.alerts.success')
            <form method="post" action="{{ route('post_contact_us') }}">
                @csrf
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control" required name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                <label>{{ __('Mail') }}</label>
                <input type="email" class="form-control" required name="email" placeholder="{{ __('Mail') }}" value="{{ old('mail') }}">
                <label>{{ __('Subject') }}</label>
                <input type="text" class="form-control" required name="subject" placeholder="{{ __('Subject') }}" value="{{ old('subject') }}">
                <label>{{ __('Massage') }}</label>
                <textarea class="form-control" rows="10" required name="massage" placeholder="{{ __('Massage') }}">{{ old('massage') }}</textarea>
                {{-- <input class="mt-4" type="file" name="file" > --}}
                <div class="btns mt-3">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Send') }}</button>

                </div>
            </form>
        </div>



        </div>
    </div>


</div>

@endsection