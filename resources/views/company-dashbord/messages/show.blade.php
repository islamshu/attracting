@extends('layouts.company')
@section('content')
    {{-- <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">الرسائل</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">الرسائل</a>
                        </li>
                     

                    </ol>
                </div>
            </div>
        </div>

    </div>
    <section id="basic-form-layouts">
        <div class="row match-height">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                        
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>اسم المرسل </label>
                                            <input type="text" class="form-control" readonly  required value="{{ $message->company->company_name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> البريد الإلكتروني</label>
                                            <input type="text" class="form-control" readonly  required value="{{ $message->company->email }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> رقم الهاتف</label>
                                            <input type="text" class="form-control" readonly  required value="{{ $message->company->phone }}">
                                        </div>
                                   
                                        <div class="col-md-6">
                                            <br><label> الموضوع </label>
                                            <input type="text" class="form-control" readonly  required value="{{ $message->subject  }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> الرسالة </label>
                                            <textarea readonly class="form-control" cols="30" rows="10">{!! $message->massage !!}
                                            </textarea>
                                        </div>  
                                    </div>
                                        
                                    </div>
                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> --}}

    <div class="content-body" style="width: 70%">
        <div class="card email-app-details d-none d-lg-block" >
          <div class="card-content">
            
            <div class="email-app-title card-body" style="background: #cac9c7">
                <p class="list-group-item-text">
                    <span class="primary">
                      <span class="badge badge-primary">{{ $message->company->company_name }}</span> <i class=""></i></span>
                  </p>  
              <h3 class="list-group-item-heading"> {!! $message->body !!}</h3>
              
            </div>
           
            @foreach ($message->megs as $msg)
            <div class="email-app-title card-body" @if($msg ->user_type == 'company') style="background: #cac9c7" @endif>
                <p class="list-group-item-text">
                    <span class="primary">
                        @if($msg->user_type == 'admin')
                      <span class="badge badge-primary">Admin</span> </span>
                        @else
                        <span class="badge badge-primary">{{ $message->company->company_name }}</span> </span>

                        @endif
                    </p>  
              <h3 class="list-group-item-heading"> {!! $message->body !!}</h3>
              
            </div>
            @endforeach
            <div class="email-app-title card-body" >
                <form action="{{ route('company.replay.message') }}" method="post">
                    @csrf
                    <input type="hidden" name="message_id" value="{{ $message->id }}">
              <textarea name="message" class="form-control"  cols="30" rows="5"></textarea>
              <br>
              <button class="btn btn-primary"> إرسال</button>
            </form>
              
            </div>
            
            
          </div>
        </div>
      </div>
@endsection
