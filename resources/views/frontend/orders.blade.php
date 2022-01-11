@extends('layouts.user_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('user_dash/css/orders.css') }}">

@endsection


    @section('content')



    <div class="main-content">

        <h3>orders page</h3>
        <!-- <p>some words to describe the page </p> -->
        <span>{{ $booking->count() }} order</span>

        <div class="content-sup">
            <div class="row">
                @foreach ($booking as $item)
                    
             
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="order-item">
                        @php
                        $image =    json_decode($item->worker->image);
                       @endphp
                        <div class="img-cover">
                            <img src="{{ asset('uploads/'.$image[0]) }}">
                        </div>
        
                        <div class="info row">
        
                            <div class="info-text col-9">
                                <h3>{{ $item->worker->name }}</h3>
                                <span class="date">{{ $item->start_at }}</span>
                                <span class="price">{{ $item->worker->salary }}$</span>
                                <a  class="btn btn-{{ get_button_booking($item) }}">{{ get_status_booking($item) }}</a>
                            </div>
        
                            <div class="dropdown col-3">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-sort-down"></i>
                                </a>
        
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('get_single_work',encrypt($item->worker->id)) }}">{{ __('show') }}</a>
                                    
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
                @endforeach
        
        
        
        
        
        
            </div>
        </div>
        </div>
</div>
@endsection