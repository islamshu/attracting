@extends('layouts.backend')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">معلومات الدفع</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">الرئيسية</a>
            </li>
           
            <li class="breadcrumb-item active">معلومات الدفع
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
            <h4 class="card-title" id="basic-layout-colored-form-control">معلومات الدفع</h4>
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

                @include('inc.alerts.error')
                @include('inc.alerts.success')
              <form class="form" method="POST" action="{{ route('generalinfo.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-body">
                    <h4 class="form-section"><i class="la la-add"></i>معلومات الدفع</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput1"></label>
                                <select name="general[commission_type]" class="form-control">
                                    <option value="percentage" @if( get_general_value('commission_type') == 'percentage') selected @endif>نسبة</option>
                                    <option value="constant" @if( get_general_value('commission_type') == 'constant') selected @endif>ثابتة</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput1">القيمة </label>
                                <input type="text" value="{{  get_general_value('commission_value') }}" id="userinput1" class="form-control border-primary" placeholder="القيمة" name="general[commission_value]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userinput1">عدد الأيام المسموح بها </label>
                                <input type="text" value="{{  get_general_value('allowed_days') }}" id="userinput1" class="form-control border-primary" placeholder="عدد الأيام" name="general[allowed_days]">
                            </div>
                        </div>
                       
                    

                    <div class="form-actions left">
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> حفظ
                        </button>
                    </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

@endsection
