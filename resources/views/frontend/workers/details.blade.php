@extends('layouts.frontend')
@section('css')
@if(app()->getLocale() =='en')
<link rel="stylesheet" href="{{ asset('front/css/ServicesDetails.css') }}" >

@else
<link rel="stylesheet" href="{{ asset('front/css/ServicesDetailsAR.css') }}">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap');
    *{
        font-family: 'Cairo', sans-serif !important;
    }
    
</style>
@endif
@endsection
@section('content')
<div class="container">
    <div class="main-sec">


        <div class="top">

            <div class="row justify-content-between">
                <!-- <div class="col-lg-2">
                <div class="img-container wow animate__fadeInUp" data-wow-delay=".7s">
                    <img src="imgs/woman2.jpg">
                </div>
            </div> -->
            @php
            $images =    json_decode($worker->image);
           @endphp

                <div class="slider col-lg-4 wow animate__fadeInUp" data-wow-delay=".7s">
                    <div class="gallrey">
                        <div class="img-mian">
                            <span class="skin-Background"><i class="fas fa-angle-left"></i></span>
                            <span class="skin-Background"><i class="fas fa-angle-right"></i></span>
                            <div class="save2">
                                <i class="far fa-heart "></i>
                            </div>
                            <img src="{{ asset('uploads/'.$images[0]) }}" alt="">
                        </div>
                        <div class="thumbnials">

                            @foreach ($images as $key=> $item)
                            <img src="{{ asset('uploads/'.$item) }}" style="width: 30% !important; height: 70px;" @if($key == 0)  class="selected"  @endif  alt="">
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-lg-8 mt-2 mt-sm-4 mar-top">
                    <div class="d-flex justify-content-xl-between">
                        <div class="header-details wow animate__fadeInUp" data-wow-delay=".7s">
                            <h2>{{ $worker->name }} <i class="fas fa-badge-check"></i></h2>
                            <p class="title"><i class="fas fa-map-marker-alt"></i> {!! $worker->dec !!} </p>


                        </div>
                        @if(app()->getLocale() =='en')

                        <h4 class="salary float-right wow animate__fadeInUp" data-wow-delay=".7s">{{ $worker->salary }}$</h4>
                        @else
                        <h4 class="salary float-right wow animate__fadeInUp" data-wow-delay=".7s">${{ $worker->salary }}</h4>

                        @endif

                        
                    </div>
                
                    @if($worker->status == "0")
                    <form action="{{ route('booking.user') }}" method="post">
                        @csrf
                        <input type="hidden" name="worker_id" value="{{ encrypt($worker->id) }}">
                        <button type="submit" class="book_now btn bg-success text-white" data-wow-delay=".7s" >{{ __('Book Now') }}</button>
                        </form>
                        @endif

                </div>

            </div>

        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="aside">
                        <h2 class="aside-title wow animate__fadeInUp" data-wow-delay=".7s">{{ __('profile') }}</h2>

                        <div class="avilablity d-flex justify-content-start wow animate__fadeInUp" data-wow-delay=".7s">

                            <div class="img-cover">
                                <img src="{{ asset('front/imgs/best-seller.png') }}">
                            </div>

                            <div class="avilbe-info">
                                <h3>{{ __('state') }}</h3>
                                <a  class="btn btn-{{ get_button_booking_all($worker) }}">{{ get_status_worker_all($worker) }}</a>                            </div>
                        </div>

                        <div class="infos">
                            <div class="info wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('nationalities') }}</h4>
                                <div class="d-flex justify-content-start align-items-center">
                                    <p>{{ __('first') }} :</p>
                                    <span>{{ $worker->nationality }}</span>
                                    <i class="far fa-badge-check"></i>
                                </div>
                            </div>

                            <div class="info wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('social information') }}</h4>
                                <div class="d-flex justify-content-start align-items-center">
                                    <p>{{ __('state') }} :</p>
                                    <span>{{ get_status( $worker->social_status) }}</span>
                                    <i class="far fa-badge-check"></i>
                                </div>
                            </div>

                            <div class="info wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('information') }}</h4>
                                <div class="d-flex justify-content-start align-items-center">
                                    <p>{{ __('age') }} : </p>
                                    <span>{{ $worker->age }}</span>
                                    <i class="far fa-badge-check"></i>
                                </div>
                            </div>


                            <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('languages') }}</h4>
                                @foreach (json_decode($worker->language) as $item)
                                <div class="d-flex justify-content-start align-items-center mb-2">
                                    <p>{{ $item }} </p>
                                  
                                    <i class="far fa-badge-check"></i>
                                </div>
                                @endforeach
                            
                            </div>

                            <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('social information') }}</h4>
                                <div class=" justify-content-start align-items-center">
                                    <p>{{ __('Degree') }} : <span>{{ get_degree($worker->social_status) }}</span><i class="far fa-badge-check"></i></p>

                                    <p>{{ __('state') }} : <span>{{ get_status($worker->social_status) }}</span><i class="far fa-badge-check"></i></p>
                                    
                                    
                                    <p>{{ __('number of children') }} :<span>{{ $worker->number_of_child }}</span><i class="far fa-badge-check"></i></p>
                                    
                                    
                                </div>
                            </div>
                         

                            
                            <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('Religion') }}</h4>
                                <div class="d-flex justify-content-start align-items-center">
                                    
                                    <span>{{ __($worker->religion) }}</span>
                                    <i class="far fa-badge-check"></i>
                                </div>
                            </div>
                            <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                <h4>{{ __('Personal information') }}</h4>
                                <div class=" justify-content-start align-items-center">
                                    <p>{{ __('skin colour') }} : {{ get_skin_colour($worker->skin_colour) }} <i class="far fa-badge-check"></i></p>
                                    <p>{{ __('weight') }} : {{ $worker->weight }} <i class="far fa-badge-check"></i></p>
                                   <p>{{ __('height') }} : {{ $worker->height }} <i class="far fa-badge-check"></i></p>

                              
                                </div>
                            </div>

                           

                        </div>

                        @if(approve_show($worker->id) == 1)
                        <div class="office-box rounded wow animate__fadeInUp clearfix" data-wow-delay=".7s">
                            <h3>{{ __('office information') }} <i class="fas fa-info"></i></h3>
                            <h4>{{ __('office name') }} :</h4>
                            <span>{{ $worker->company->company_name }}</span>
                            <h4>{{ __('office address') }} :</h4>
                            <span>{{ $worker->company->address }}</span>
                            <h4>{{ __('Email') }} :</h4>
                            <span>{{ $worker->company->email }}</span>
                            <h4>{{ __('Phone') }} :</h4>
                            <span>{{ $worker->company->phone }}</span>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-content">
                        <div class="secOne">
                            <h3 class="wow animate__fadeInUp" data-wow-delay=".7s">{{ __('Work History') }}</h3>


                            <ul class="list-unstyled">
                                <li class="wow animate__fadeInUp" data-wow-delay=".7s">
                                    
                                    {!! $worker->skill !!}
                                </li>

                               

                            </ul>
                        </div>
                        @if($worker->status == "0")
                        <form action="{{ route('booking.user') }}" method="post">
                            @csrf
                            <input type="hidden" name="worker_id" value="{{ encrypt($worker->id) }}">
                            <button type="submit" class="book_now btn bg-success text-white" data-wow-delay=".7s" >{{ __('Book Now') }}</button>
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
