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
                            <form class="form" method="post" action="{{ route('workers.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>إضافة خادمة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>الاسم  *</label>
                                            <input type="text" required class="form-control" name="name" value="{{ old('name')  }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الشركة* </label>
                                            <select required class="selectpicker form-control" name="company_id" data-live-search="true">
                                                <option  value="" selected disabled>اختر الشركة</option>

                                                @foreach ($companys as $item)
                                                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> المحافظة </label>
                                            <select required class="selectpicker form-control" name="governorate_id" id="governorate_id" data-live-search="true">
                                                <option  value="" selected disabled>اختر المحافظة</option>

                                                @foreach ($governments as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الولاية </label>
                                            <select required class=" form-control" id="state_id" name="state_id" >
                                                <option value="" selected disabled >اختر الولاية</option>
                                                
                                            </select>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <br><label>تاريخ الميلاد  *</label>
                                            <input type="date" required class="form-control" name="DOB" value="{{ old('DOB')  }}">
                                        </div>
                                        <div class="col-md-4">
                                            <br><label> مكان الميلاد  *</label>
                                            <input type="text" required class="form-control" name="place_of_birth" value="{{ old('place_of_birth')  }}">
                                        </div>
                                        <div class="col-md-4">
                                            <br><label> مكان الإقامة *</label>
                                            <input type="text" required class="form-control" name="living" value="{{ old('living')  }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الجنسية* </label>
                                            <select class="selectpicker form-control" required name="nationality" data-live-search="true">
                                                <option  value="" selected disabled>اختر الجنسية</option>

                                                @foreach (get_natonalty() as $item)
                                                <option  value="{{ $item }}">{{ $item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-6">
                                        <br><label> اللغات* </label>
                                        <select class="selectpicker form-control" required name="language[]" multiple  data-live-search="true">
                                            <option  value="" selected disabled>اختر اللغات</option>

                                            @foreach (get_language() as $item)
                                            <option  value="{{ $item }}">{{ $item}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <br><label> الديانة* </label>
                                        <select class="selectpicker form-control" required name="religion" >
                                            <option  value="" selected disabled>اختر الديانة </option>
                                            <option  value="islam">Islam</option>
                                            <option  value="christian">Christian</option>
                                            <option value="jewish">Jewish</option>
                                            <option value="buddhism">Buddhism</option>
                                            <option value="hindu">Hindu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br><label> الحالة الإجتماعية* </label>
                                        <select class="selectpicker form-control" required name="social_status" >
                                            <option  value="" selected disabled>اختر الحالة الإجتماعية</option>
                                            <option  value="0">عزباء</option>
                                            <option  value="1">متزوجة</option>
                                            <option value="2">مطلقة</option>
                                            <option value="3">أرملة</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br><label> لون البشرة * </label>
                                        <select class="selectpicker form-control" required name="skin_colour" >
                                            <option  value="" selected disabled>اختر لون البشرة </option>
                                            <option  value="0">بيضاء</option>
                                            <option  value="1">حنطية</option>
                                            <option value="2">سمراء</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br><label>   المستوى التعليمي * </label>
                                        <select class="selectpicker form-control" required name="degree" >
                                            <option  value="" selected disabled>اختر المستوى التعليمي   </option>
                                            <option  value="0">غير متعلم</option>
                                            <option  value="1">ابتدائي</option>
                                            <option value="2">اعدادي</option>
                                            <option  value="3">ثانوي</option>
                                            <option  value="4">جامعي</option>
                                            <option value="5">مؤهلات عليا</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <br><label> عدد الأطفال  *</label>
                                        <input type="number" required class="form-control" name="number_of_child" min="0" value="{{ old('number_of_child')  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <br><label> الطول  * </label>
                                        <input type="number" required class="form-control" name="weight" min="0" value="{{ old('weight')  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <br><label> الوزن *</label>
                                        <input type="number" required class="form-control" name="height" min="0" value="{{ old('height')  }}">
                                    </div>
                                    <div class="col-md-3">
                                        <br><label> قيمة الراتب  *</label>
                                        <input type="string" class="form-control" name="salary" required value="{{ old('salary')  }}">
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <br><label>   وصف عن الخادمة بالعربي  </label>
                                        <textarea name="dec_ar" class="ckeditor" cols="30"
                                            rows="10">{{ old('dec_ar') }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <br><label> وصف عن الخادمة بالانجليزي </label>
                                        <textarea name="dec_en" class="ckeditor" cols="30"
                                            rows="10">{{ old('dec_en') }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <br><label>   الخبرات بالعربي *</label>
                                        <textarea name="skill_ar" required class="ckeditor" cols="30"
                                            rows="10">{{ old('skill_ar') }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <br><label> الخبرات بالانجليزي *</label>
                                        <textarea name="skill_en" required class="ckeditor" cols="30"
                                            rows="10">{{ old('skill_en') }}</textarea>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <br><label> ارفق صور الخادمة  </label>

                                    <div class="input-group control-group increment" >
                                        <input type="file" name="image[]" required class="form-control">
                                        <div class="input-group-btn"> 

                                          <button style="margin-right: 20px;" class="btn btn-success image" type="button"><i class="glyphicon glyphicon-plus"></i>اضافة المزيد</button>
                                        </div>
                                      </div>
                                    </div>
                                    
                                      <div class="clone hide" style="display: none">
                                        <div class="control-group input-group" style="margin-top:10px">
                                          <input type="file" name="image[]" class="form-control">
                                          <div class="input-group-btn"> 
                                            <button  style="margin-right: 20px;" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> حذف</button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <br><label> اللغات  </label>
    
                                    <div class="input-group control-group incrementLang" >
                                        <input type="text" name="language[0][name]"  placeholder="اسم اللغة" class="form-control">
                                        <select  name="language[0][value]"  class="form-control">
                                            <option value="good">جيد</option>
                                            <option value="medium">متوسط</option>
                                            <option value="beginner">مبتديء</option>
                                        </select>
                                        <div class="input-group-btn"> 
    
                                          <button style="margin-right: 20px;" class="btn btn-success lang" type="button"><i class="glyphicon glyphicon-plus"></i>اضافة المزيد</button>
                                        </div>
                                      </div>
                                    </div>
                                    
                                      <div class="cloneLang hide" style="display: none">
                                       
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#governorate_id').change(function() {
           let parent = $(this).val();

           $.ajax({
            url: '{{ route('get_state') }}',
            type: 'post',
            dataType: 'html',
            data: {
                "_token": "{{ csrf_token() }}",
                parent: parent
            },
            success: function(data) {
                var jsonData = data;
                var obj = JSON.parse(jsonData);
                $('#state_id').html(new Option('اختر الولاية', ''));
                for (i in obj) {
                    
            $('#state_id').append(new Option(obj[i].name, obj[i].id));
            }
            }


        });
        });
      $(".image").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      var i = 1 ;
      $(".lang").click(function(){ 
     
        //   var html = $(".cloneLang").html();
        var html = ` <div class="control-group input-group" style="margin-top:10px">
                                        <input type="text" name="language[`+i+`][name]"  placeholder="اسم اللغة"  class="form-control">
                                        <select  name="language[`+i+`][value]"  class="form-control">
                                            <option value="good">جيد</option>
                                            <option value="medium">متوسط</option>
                                            <option value="beginner">مبتديء</option>
                                        </select>                                         
                                         <div class="input-group-btn"> 
                                        <button  style="margin-right: 20px;" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> حذف</button>
                                      </div>
                                    </div>`;
                                    i = i + 1;

          $(".incrementLang").after(html);
    
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
@endsection