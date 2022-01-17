@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">الشركات</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">الشركات</a>
                        </li>
                        <li class="breadcrumb-item active">بيانات شركة
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">بيانات شركة</h4>
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
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>بيانات شركة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">اسم الشركة</label>
                                                <input type="text" readonly value="{{ $company->company_name }}" id="userinput1"
                                                     class="form-control border-primary" placeholder="اسم الشركة" name="company_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput2">اسم المالك</label>
                                                <input type="text" readonly value="{{ $company->owner_name }}" id="userinput2"
                                                    class="form-control border-primary" placeholder="اسم المالك"
                                                    name="owner_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput2">البريد الإلكتروني</label>
                                                <input type="email" readonly value="{{ $company->email }}" id="userinput2"
                                                    class="form-control border-primary" placeholder="البريد الإلكتروني"
                                                    name="email">
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput3">رقم الهاتف</label>
                                                <input type="number" value="{{ $company->phone }}" readonly id="userinput3"
                                                    class="form-control border-primary" placeholder="رقم الهاتف"
                                                    name="phone">
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput4"> عنوان الشركة </label>
                                                <input type="text" readonly id="userinput4" value="{{$company->address}}"
                                                    class="form-control border-primary" placeholder="عنوان الشركة "
                                                    name="address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput4"> السجل التجاري</label> <br>
                                               <a target="_blank" href="{{ asset('uploads/'.$company->commercial_register) }}"> <input type="button" class="btn btn info"></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions left">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection