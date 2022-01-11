@extends('layouts.user_dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('user_dash/css/contact.css') }}">

@endsection
@section('content')
    
    
<div class="content-box">
    <h3>{{ __('massages') }}</h3>
    <div class="massage-box">
    
        <h4>{{ __('massage here create for anything') }}</h4>
        @include('inc.alerts.error')
        @include('inc.alerts.success')
        <form action="{{ route('post_message') }}" method="post" enctype="multipart/form-data">
            @csrf
            


            <div class="form-group">
                <div class="row  align-items-center">
                    <label class="col-lg-2">{{ __('Subject') }}</label>

                    <div class="col-lg-10">
                        <input type="text" name="subject" required class="form-control" placeholder="{{ __('subject') }}">
                    </div>
                </div>
                
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2 ">{{ __('Massage') }}</label>

                    <div class="col-lg-10">
                        <textarea rows="10" name="massage" required class="form-control" placeholder="{{ __('Massage') }}"></textarea>
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