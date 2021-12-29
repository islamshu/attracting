@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">الخدمات</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">الخدمات</a>
                        </li>
                        <li class="breadcrumb-item active">اضافة خدمة
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">اضافة خدمة</h4>
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
                            <form class="form" method="post" action="{{ route('services.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>إضافة خدمة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالعربي * </label>
                                            <input type="text" class="form-control" name="title_ar" value="{{ old('title_ar')  }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> العنوان بالانجليزي * </label>
                                            <input type="text" class="form-control" name="title_en" value="{{ old('title_en')  }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف  بالعربي * </label>
                                            <textarea name="dec_ar" class="ckeditor" cols="30"
                                                rows="10">{{ old('dec_ar') }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف  بالانجليزي * </label>
                                            <textarea name="dec_en" class="ckeditor" cols="30"
                                                rows="10">{{ old('dec_en') }}</textarea>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <br><label>الايقونة  </label> 
                                            <br>
                                            <label for=""> الايقوانت تجدها هنا  . <a target="_blank" href="https://fontawesome.com/v5.15/icons?d=gallery&p=2">انقر هنا</a></label>
                                            <input type="text" name="icon" class="form-control" value="{{ old('icon') }}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions left">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
