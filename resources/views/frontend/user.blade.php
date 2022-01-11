@extends('layouts.user_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('user_dash/css/mids.css') }}">

@endsection


    @section('content')



    <div class="main-content">
        <h3>my mids</h3>
    
        <div class="mids-box">
    
            <div class="row ">
                @forelse ($booking as $item)
                <div class="col-lg-4 col-md-6 col-sm-6  rounded text-center">
                    <div class="service-item wow animate__fadeInUp" data-wow-delay=".7s">
                        <a href="{{ route('get_single_work',encrypt($item->worker->id)) }}"><i class="far fa-info-circle"></i></a>
                        <span class="date">{{ $item->created_at->diffForHumans() }}</span>
                        @php
                         $image =    json_decode($item->worker->image);
                        @endphp
                        <div class="img-box">
                            <img style="width: 100%;" src="{{ asset('uploads/'.$image[0]) }}">
                        </div>
                        <div class="body-box">
                            <h2>{{ $item->worker->name }}</h2>
                            <p>{!! Str::limit($item->worker->dec, 30, ' ...') !!}</p>
                        
    
                        </div>
                    </div>
                </div>
                    
                @empty
                <h2>{{ __('No item here') }}</h2>
                    
                @endforelse
    

                
    
            </div>
    
    
        </div>
    </div>
</div>
@endsection