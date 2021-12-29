@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">القوائم</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">القوائم</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل قائمة
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">تعديل قائمة</h4>
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
                            <form class="form" method="post" action="{{ route('menu.update',$menu->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>تعديل خدمة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label> العنوان  بالعربي * </label>
                                            <input type="text" class="form-control" name="title_ar" required value="{{ $menu->getTranslation('title','ar')  }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> العنوان بالانجليزي * </label>
                                            <input type="text" class="form-control" name="title_en" required value="{{ $menu->getTranslation('title','en')   }}">
                                        </div>
                                      
                                        
                                        <div class="col-md-6">
                                            
                                            <label for=""> الرابط </label>
                                            <input type="text" name="url" class="form-control" required value="{{ $menu->url }}">
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
