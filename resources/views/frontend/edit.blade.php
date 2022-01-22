@extends('layouts.user_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('user_dash/css/contact.css') }}">

@endsection
@section('content')
    
    
<div class="content-box">
    <h3>{{ __('profile') }}</h3>
    <div class="massage-box">
    
        @include('inc.alerts.error')
        @include('inc.alerts.success')
        <form action="{{ route('profile.edituser') }}" method="post" enctype="multipart/form-data">
            @csrf
            


            <div class="form-group">
                <div class="row  align-items-center">
                    <label class="col-lg-2">{{ __('Edit profile') }}</label>

                    <div class="col-lg-10">
                        <input type="text" name="name" value="{{ auth()->user()->name }}" required class="form-control" placeholder="{{ __('name') }}">
                    </div>
                </div>
                
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2 ">{{ __('email') }}</label>

                    <div class="col-lg-10">
                        <input type="email" name="email" value="{{ auth()->user()->email }}" required class="form-control" placeholder="{{ __('email') }}">
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2 ">{{ __('phone') }}</label>

                    <div class="col-lg-10">
                        <input type="string" name="phone" value="{{ auth()->user()->phone }}" required class="form-control" placeholder="{{ __('email') }}">
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2 ">{{ __('password') }}</label>

                    <div class="col-lg-10">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('password') }}">
                    </div>
                </div>
                
            </div>
            <div class="card-footer d-flex">
                <div class="btns mr-auto">
                    <input type="submit" class="btn send" value="{{ __('Send') }}">
                </div>
    
    
            </div>

           

        </form>

       

    </div>


</div>
@endsection