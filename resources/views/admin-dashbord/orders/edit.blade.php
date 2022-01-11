@extends('layouts.company')
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
                        <li class="breadcrumb-item active">تعديل خادمة
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">تعديل خادمة</h4>
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
                            <form class="form" method="post" action="{{ route('company.workers.update', $work->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>إضافة خادمة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>الاسم *</label>
                                            <input type="text" required class="form-control" name="name"
                                                value="{{ $work->name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الشركة* </label>
                                            <select required class="selectpicker form-control" name="company_id"
                                                data-live-search="true">
                                                <option value="" disabled>اختر الشركة</option>

                                                @foreach ($companys as $item)
                                                    <option value="{{ $item->id }}" @if ($work->company_id == $item->id) selected @endif>
                                                        {{ $item->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> المحافظة </label>
                                            <select required class="selectpicker form-control" name="governorate_id" id="governorate_id" data-live-search="true">
                                                <option  value=""  disabled>اختر المحافظة</option>

                                                @foreach ($governments as $item)
                                                <option value="{{ $item->id }}" @if ($work->governorate_id == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الولاية </label>
                                           
                                            <select required class=" form-control" id="state_id" name="state_id" >
                                                <option value=""  disabled >اختر الولاية</option>
                                                @foreach ($states as $state)

                                                <option value="{{ $state->id }}" @if ($work->state_id == $state->id) selected @endif>{{ $state->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <br><label>تاريخ الميلاد *</label>
                                            <input type="date" required class="form-control" name="DOB"
                                                value="{{ $work->DOB }}">
                                        </div>
                                        <div class="col-md-4">
                                            <br><label> مكان الميلاد *</label>
                                            <input type="text" required class="form-control" name="place_of_birth"
                                                value="{{ $work->place_of_birth }}">
                                        </div>
                                        <div class="col-md-4">
                                            <br><label> مكان الإقامة *</label>
                                            <input type="text" required class="form-control" name="living"
                                                value="{{ $work->living }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الجنسية* </label>
                                            <select class="selectpicker form-control" required name="nationality"
                                                data-live-search="true">
                                                <option value="" disabled>اختر الجنسية</option>

                                                @foreach (get_natonalty() as $item)
                                                    <option value="{{ $item }}" @if ($item == $work->nationality) selected @endif>
                                                        {{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> اللغات* </label>
                                            <select class="selectpicker form-control" required name="language[]" multiple
                                                data-live-search="true">
                                                <option value="" disabled>اختر اللغات</option>

                                                @foreach (get_language() as $item)
                                                    <option value="{{ $item }}" @foreach (json_decode($work->language) as $tagp)
                                                        {{ $tagp == $item ? 'selected' : '' }}
                                                @endforeach
                                                >{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الديانة* </label>
                                            <select class="selectpicker form-control" required name="religion">
                                                <option value="" disabled>اختر الديانة </option>
                                                <option value="islam" @if ($work->religion == 'islam') selected @endif>Islam</option>
                                                <option value="christian" @if ($work->religion == 'christian') selected @endif>Christian</option>
                                                <option value="jewish" @if ($work->religion == 'jewish') selected @endif>Jewish</option>
                                                <option value="buddhism" @if ($work->religion == 'buddhism') selected @endif>Buddhism</option>
                                                <option value="hindu" @if ($work->religion == 'hindu') selected @endif>Hindu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الحالة الإجتماعية* </label>
                                            <select class="selectpicker form-control" required name="social_status">
                                                <option value="" disabled>اختر الحالة الإجتماعية</option>
                                                <option value="0" @if ($work->social_status == '0') selected @endif>عزباء</option>
                                                <option value="1" @if ($work->social_status == '1') selected @endif>متزوجة</option>
                                                <option value="2" @if ($work->social_status == '2') selected @endif>مطلقة</option>
                                                <option value="3" @if ($work->social_status == '3') selected @endif>أرملة</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> لون البشرة * </label>
                                            <select class="selectpicker form-control" required name="skin_colour">
                                                <option value="" disabled>اختر لون البشرة </option>
                                                <option value="0" @if ($work->skin_colour == '0') selected @endif>بيضاء</option>
                                                <option value="1" @if ($work->skin_colour == '1') selected @endif>حنطية</option>
                                                <option value="2" @if ($work->skin_colour == '2') selected @endif>سمراء</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> المستوى التعليمي * </label>
                                            <select class="selectpicker form-control" required name="degree">
                                                <option value=""  disabled>اختر المستوى التعليمي </option>
                                                <option value="0" @if ($work->degree == "1") selected @endif>غير متعلم</option>
                                                <option value="1" @if ($work->degree == "2") selected @endif>ابتدائي</option>
                                                <option value="2" @if ($work->degree == "3") selected @endif>اعدادي</option>
                                                <option value="3" @if ($work->degree == "4") selected @endif>ثانوي</option>
                                                <option value="4" @if ($work->degree == "5") selected @endif>جامعي</option>
                                                <option value="5" @if ($work->degree == "6") selected @endif>مؤهلات عليا</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <br><label> عدد الأطفال *</label>
                                            <input type="number" required class="form-control" name="number_of_child"
                                                min="0" value="{{ $work->number_of_child }}">
                                        </div>
                                        <div class="col-md-3">
                                            <br><label> الطول * </label>
                                            <input type="number" required class="form-control" name="weight" min="0"
                                                value="{{ $work->weight }}">
                                        </div>
                                        <div class="col-md-3">
                                            <br><label> الوزن *</label>
                                            <input type="number" required class="form-control" name="height" min="0"
                                                value="{{ $work->height }}">
                                        </div>
                                        <div class="col-md-3">
                                            <br><label> قيمة الراتب *</label>
                                            <input type="string" class="form-control" name="salary" required
                                                value="{{ $work->salary }}">
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> وصف عن الخادمة بالعربي </label>
                                            <textarea name="dec_ar" class="ckeditor" cols="30"
                                                rows="10">{!! $work->getTranslation('dec', 'ar') !!}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> وصف عن الخادمة بالانجليزي </label>
                                            <textarea name="dec_en" class="ckeditor" cols="30"
                                                rows="10">{!! $work->getTranslation('dec', 'en') !!}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الخبرات بالعربي *</label>
                                            <textarea name="skill_ar" required class="ckeditor" cols="30"
                                                rows="10">{!! $work->getTranslation('skill', 'ar') !!}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الخبرات بالانجليزي *</label>
                                            <textarea name="skill_en" required class="ckeditor" cols="30"
                                                rows="10">{!! $work->getTranslation('skill', 'en') !!}</textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <br><label> ارفق صور الخادمة </label>

                                            <div class="input-group control-group increment">
                                                <input type="file" name="image[]" class="form-control">
                                                <div class="input-group-btn">

                                                    <button style="margin-right: 20px;" class="btn btn-success"
                                                        type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clone hide" style="display: none">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="image[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button style="margin-right: 20px;" class="btn btn-danger"
                                                        type="button"><i class="glyphicon glyphicon-remove"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="clone ">
                                            @foreach (json_decode($work->image) as $image)
                                                <div class="control-group input-group" style="margin-top:10px">
                                                    <input type="text" name="test[]" value="{{ $image }}"
                                                        class="form-control">
                                                    <img src="{{ asset('uploads/' . $image) }}" width="100" height="70"
                                                        alt="">
                                                    <div class="input-group-btn">
                                                        <button style="margin-right: 20px;" class="btn btn-danger"
                                                            type="button"><i class="glyphicon glyphicon-remove"></i>
                                                            Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
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
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection
