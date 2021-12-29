@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">القسم الأول</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        
                        <li class="breadcrumb-item active">القسم الأول
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">القسم الأول </h4>
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
                            <form class="form" method="post" action="{{ route('firstsection.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>الصندوق الأول </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>الأيقونة* </label>
                                            <input type="text" name="first_icon" class="form-control" required value="{!! @$first->first_icon !!}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالعربي * </label>
                                            <input type="text" name="first_title_ar" class="form-control" required value="{!! @$first->getTranslation('first_title','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالانجليزي * </label>
                                            <input type="text" name="first_title_en" class="form-control" required value="{!! @$first->getTranslation('first_title','en') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف   بالعربي * </label>
                                            <input type="text" name="first_dec_ar" class="form-control" required value="{!! @$first->getTranslation('first_dec','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف  بالانجليزي * </label>
                                            <input type="text" name="first_dec_en" class="form-control" required value="{!! @$first->getTranslation('first_dec','en') !!}">
                                        </div>
                                      
                                    </div>
                                        <br>
                                    <h4 class="form-section"><i class="la la-add"></i>الصندوق الثاني </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>الأيقونة* </label>
                                            <input type="text" name="secand_icon" class="form-control" required value="{!! @$first->secand_icon !!}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالعربي * </label>
                                            <input type="text"  name="secand_title_ar" class="form-control" required value="{!! @$first->getTranslation('secand_title','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالانجليزي * </label>
                                            <input type="text" name="secand_title_en" class="form-control" required value="{!! @$first->getTranslation('secand_title','en') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف   بالعربي * </label>
                                            <input type="text" name="secand_dec_ar" class="form-control" required value="{!! @$first->getTranslation('secand_dec','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف  بالانجليزي * </label>
                                            <input type="text" name="secand_dec_en" class="form-control" required value="{!! @$first->getTranslation('secand_dec','en') !!}">
                                        </div>
                                      
                                    </div>

                                    <br>
                                    <h4 class="form-section"><i class="la la-add"></i>الصندوق الثالث </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>الأيقونة* </label>
                                            <input type="text" name="third_icon" class="form-control" required value="{!! @$first->third_icon !!}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالعربي * </label>
                                            <input type="text" name="third_title_ar" class="form-control" required value="{!! @$first->getTranslation('third_title','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالانجليزي * </label>
                                            <input type="text" name="third_title_en" class="form-control" required value="{!! @$first->getTranslation('third_title','en') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف   بالعربي * </label>
                                            <input type="text" name="third_dec_ar" class="form-control" required value="{!! @$first->getTranslation('third_dec','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف  بالانجليزي * </label>
                                            <input type="text" name="third_dec_en" class="form-control" required value="{!! @$first->getTranslation('third_dec','en') !!}">
                                        </div>
                                      
                                    </div>

                                    <br>

                                    <h4 class="form-section"><i class="la la-add"></i>الصندوق الرابع </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>الأيقونة* </label>
                                            <input type="text" name="fourth_icon" class="form-control" required value="{!! @$first->fourth_icon !!}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالعربي * </label>
                                            <input type="text" name="fourth_title_ar" class="form-control" required value="{!! @$first->getTranslation('fourth_title','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالانجليزي * </label>
                                            <input type="text" name="fourth_title_en" class="form-control" required value="{!! @$first->getTranslation('fourth_title','en') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف   بالعربي * </label>
                                            <input type="text" name="fourth_dec_ar" class="form-control" required value="{!! @$first->getTranslation('fourth_dec','ar') !!}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف  بالانجليزي * </label>
                                            <input type="text" name="fourth_dec_en" class="form-control" required value="{!! @$first->getTranslation('fourth_dec','en') !!}">
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
