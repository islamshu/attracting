@extends('layouts.user_dashboard')
@section('css')
@if (app()->getLocale() == 'en')

<link rel="stylesheet" href="{{ asset('user_dash/css/massageContent.css') }}">

@else
<link rel="stylesheet" href="{{ asset('user_dash/css/MassageContetnAr.css') }}">

{{-- <link rel="stylesheet" href="{{ asset('user_dash/css/massagesAr.css') }}"> --}}

@endif
@endsection


    @section('content')




    <div class="content-box">

                

        <div class="massage-content rounded">
            <div class="head">
                <div class="img-box">
                    <img src="{{ asset('front/user_image.png') }}" alt="">
                </div>
                <div class="info">
                    <div class="from">
                        <span class="name">{{ auth()->user()->name }} </span>
                        (<span class="gmail">{{ auth()->user()->email }}</span>)
                    </div>

                    <div class="to">
                        to <span class="name">Admin </span>
                        (<span class="gmail">{{ get_general_value('email') }}</span> ,<span class="gmail">{{ get_general_value('phone') }}</span> )
                    </div>
                </div>

                <div class="date-val">{{ $message->created_at }}</div>
            </div>

            <div class="m-body">
                <span>{{ auth()->user()->name }}</span>
                <p>{!! $message->message !!}
                </p>
            </div>
            @foreach (App\FrontReplay::where('message_id',$message->id)->get() as $item)
            <div class="m-body" @if($item->user_type =='admin')style="background: #e0e0e0" @endif>
                @if($item->user_type =='admin')
                <span>Admin</span>
                @else
                <span>{{ auth()->user()->name }}</span>

                @endif
                <p>{!! $item->body !!}
                </p>
            </div>
            @endforeach
            

            <div class="replay">
                <h5>{{ __('Replay') }}</h5>
                <form method="post" action="{{ route('replay_front') }}"> 
                    @csrf
                    <input type="hidden" name="message_id" value="{{ $message->id }}">
                    <input type="hidden" name="user_type" value="user">
                    <textarea name="body" class="form-control" rows="5" placeholder="{{ __('Enter Massage Here') }}" ></textarea>
                    <button type="submit" class="btn btn-success mt-3"><{{ __('Send') }}</button>
                </form>
            </div>
        </div>

    </div>
@endsection