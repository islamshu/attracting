@extends('layouts.frontend')
@section('css')
@if(app()->getLocale() =='en')
<link rel="stylesheet" href="{{ asset('front/css/ServicesDetails.css') }}" >

@else
<link rel="stylesheet" href="{{ asset('front/css/ServicesDetailsAr.css') }}">
@endif
@endsection
@section('content')
    <div class="container">


        <div class="main-sec">


            <div class="top">

                <div class="row justify-content-between">
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

                    <div class="col-lg-8 d-flex justify-content-xl-between mt-2">
                        <div class="header-details wow animate__fadeInUp" data-wow-delay=".7s">
                            <h2>Aaradhya <i class="fas fa-badge-check"></i></h2>
                            <p class="title"><i class="fas fa-map-marker-alt"></i> {!! $worker->dec !!} </p>
                                <a href="#" class="btn bg-success text-white wow animate__fadeInUp mb-4" data-wow-delay=".7s">book now</a>

                        </div>


                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-expanded="false">
                                <a href=""> <i class="fas fa-ellipsis-v"></i></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><i class="far fa-save"></i> Action</a>
                                <a class="dropdown-item" href="#"><i class="far fa-share-square"></i> Another action</a>
                                <a class="dropdown-item" href="#"><i class="far fa-print"></i> Something else here</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="aside">
                            <h2 class="aside-title wow animate__fadeInUp" data-wow-delay=".7s">profile</h2>

                            <div class="avilablity d-flex justify-content-start wow animate__fadeInUp" data-wow-delay=".7s">

                                <div class="img-cover">
                                    <img src="{{ asset('front/imgs/best-seller.png') }}">
                                </div>

                                <div class="avilbe-info">
                                    <h3>available state</h3>
                                    <span>available</span>
                                </div>
                            </div>

                            <div class="infos">
                                <div class="info wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>nationalities</h4>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p>first :</p>
                                        <span>{{ $worker->nationality }}</span>
                                        <i class="far fa-badge-check"></i>
                                    </div>
                                </div>

                                <div class="info wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>social information</h4>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p>state :</p>
                                        <span>{{ get_status( $worker->social_status) }}</span>
                                        <i class="far fa-badge-check"></i>
                                    </div>
                                </div>

                                <div class="info wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>information</h4>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <p>age : </p>
                                        <span>{{ $worker->age }}</span>
                                        <i class="far fa-badge-check"></i>
                                    </div>
                                </div>


                                <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>languages</h4>
                                    @foreach (json_decode($worker->language) as $item)
                                    <div class="d-flex justify-content-start align-items-center mb-2">
                                        <p>{{ $item }} </p>
                                      
                                        <i class="far fa-badge-check"></i>
                                    </div>
                                    @endforeach
                                
                                </div>

                                <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>social information</h4>
                                    <div class=" justify-content-start align-items-center">
                                        <p>Degree : <span>{{ get_degree($worker->social_status) }}</span><i class="far fa-badge-check"></i></p>

                                        <p>state : <span>{{ get_status($worker->social_status) }}</span><i class="far fa-badge-check"></i></p>
                                        
                                        
                                        <p>number of children :<span>{{ $worker->number_of_child }}</span><i class="far fa-badge-check"></i></p>
                                        
                                        
                                    </div>
                                </div>
                             

                                
                                <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>Religion</h4>
                                    <div class="d-flex justify-content-start align-items-center">
                                        
                                        <span>{{ __($worker->religion) }}</span>
                                        <i class="far fa-badge-check"></i>
                                    </div>
                                </div>
                                <div class="info  wow animate__fadeInUp" data-wow-delay=".7s">
                                    <h4>Information about the character's</h4>
                                    <div class=" justify-content-start align-items-center">
                                        <p>skin colour : {{ get_skin_colour($worker->skin_colour) }} <i class="far fa-badge-check"></i></p>
                                        <p>weight : {{ $worker->weight }} <i class="far fa-badge-check"></i></p>
                                       <p>height : {{ $worker->height }} <i class="far fa-badge-check"></i></p>

                                  
                                    </div>
                                </div>

                               

                            </div>


                            <div class="office-box rounded wow animate__fadeInUp clearfix" data-wow-delay=".7s">
                                <h3>office information <i class="fas fa-info"></i></h3>
                                <h4>office name :</h4>
                                <span>{{ $worker->company->company_name }}</span>
                                <h4>office address :</h4>
                                <span>{{ $worker->company->address }}</span>
                                <h4>Email :</h4>
                                <span>{{ $worker->company->email }}</span>
                                <h4>Phone :</h4>
                                <span>{{ $worker->company->phone }}</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-content">
                        

                            <div class="secOne">
                                <h3 class="wow animate__fadeInUp" data-wow-delay=".7s">work history</h3>

                                <h4 class="salary float-right wow animate__fadeInUp" data-wow-delay=".7s">{{ $worker->salary }}$</h4>

                                <ul class="list-unstyled">
                                    <li class="wow animate__fadeInUp" data-wow-delay=".7s">
                                        
                                        {!! $worker->skill !!}
                                    </li>

                                   

                                </ul>
                            </div>

                            <a href="#" class="btn bg-success text-white wow animate__fadeInUp mb-4" data-wow-delay=".7s">book now</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>





    </div>


@endsection
