@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">الخادمات</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">الخادمات</a>
                        </li>
                        <li class="breadcrumb-item active">اضافة خادمة
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">اضافة خادمة</h4>
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
                            <form class="form" method="post" action="{{ route('how_its_work.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>إضافة خادمة</h4>
                                    <div class="row increment" >
                                        <div class="col-md-7">

                                            <br><label> الأيقونة </label>
    
                                        <div class="input-group control-group " >
                                            <input required type="text" name="icon" value="{{ old('icon') }}"  class="form-control">
                                          </div>
                                        </div>
                              
                                        <div class="col-md-6">
                                            <br><label>  العنوان بالعربي  </label>
    
                                          <div class="input-group control-group " >
                                            <input required type="text" name="title_ar" value="{{ old('title_ar') }}"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label>  العنوان بالانجليزي  </label>
    
                                          <div class="input-group control-group " >
                                            <input required type="text" name="title_en"  value="{{ old('title_en') }}"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف بالعربي  </label>
    
                                            <div class="input-group control-group " >
                                                <textarea required name="dec_ar" class="form-control ckeditor"    cols="30" rows="15">
                                                    {{ old('dec_ar') }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الوصف بالعربي  </label>
    
                                            <div class="input-group control-group " >
                                                <textarea required name="dec_en" class="form-control ckeditor"   cols="30" rows="15">
                                                    {{ old('dec_en') }}
                                                </textarea>
                                            </div>
                                        </div>
                                   
                                    </div>
                                    <br>
                               
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
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
@endsection