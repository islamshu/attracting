@extends('layouts.company')
@section('content')
<div class="row">
    
    
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="info">{{ App\Worker::where('company_id',auth()->id())->count() }}</h3>
                <h6>{{ __('Worker Count') }}</h6>
              </div>
              <div>
                <i class="icon-loop  info font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 75%"
              aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                    <h3 class="info">{{ App\Worker::where('company_id',auth()->id())->where('status','0')->count() }}</h3>
                    <h6>{{ __('Not Booked') }}</h6>
                </div>
                <div>
                  <i class="icon-user-following warning font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @php
      $now = Carbon\Carbon::now();

    @endphp
      <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
              
                    <h3 class="info">{{ App\Worker::where('company_id',auth()->id())->where('status','1')->count() }}</h3>
                    <h6>{{ __('Under proccess') }}</h6>
                </div>
                <div>
                  <i class="icon-user-following success font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 65%"
                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
              
                    <h3 class="info">{{ App\Worker::where('company_id',auth()->id())->where('status','2')->count() }}</h3>
                    <h6>{{ __('Booked Now') }}</h6>
                </div>
                <div>
                  <i class="icon-user-following info font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 65%"
                aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
   
  </div>
@endsection