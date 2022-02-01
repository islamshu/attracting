@extends('layouts.user_dashboard')
@section('css')
@if (app()->getLocale() == 'en')

<link rel="stylesheet" href="{{ asset('user_dash/css/massages.css') }}">

@else
<link rel="stylesheet" href="{{ asset('user_dash/css/massagesAr.css') }}">

{{-- <link rel="stylesheet" href="{{ asset('user_dash/css/massagesAr.css') }}"> --}}

@endif
@endsection


    @section('content')




    <div class="content-box">
        <h3>{{ __('massages') }}</h3>
        <div class="massage-box rounded">
        
            <!-- <h4>massage here create for anything</h4> -->
        
        <div class="massages">
            

            @foreach ($messages as $item)
            <div class="massage d-flex">
                <div class="img-box">
                    <img src="{{ asset('front/user_image.png') }}" alt="">
                </div>
                <div class="massage-body">
                    <a href="{{ route('show.message',$item->id) }}">
                        <div class="name"></div>
                        <div class="title">{{ $item->subject }}</div>
                        <div class="massage-txt">{{ Str::limit($item->message , 40) }}</div>
                    </a>
                </div>
                <div class="date">{{ $item->created_at }}</div>
            </div>
            @endforeach

        </div>
        
        </div>
    
    
    </div>
@endsection