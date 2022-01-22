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
                        <li class="breadcrumb-item active">اضافة شركة
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
                        <h4 class="card-title" id="basic-layout-colored-form-control">اضافة شركة</h4>
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
                            <form class="form" method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-add"></i>إضافة شركة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">اسم الشركة</label>
                                                <input type="text" required value="{{ old('company_name') }}" id="userinput1"
                                                    class="form-control border-primary" placeholder="اسم الشركة" name="company_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput2">اسم المالك</label>
                                                <input type="text" required value="{{ old('owner_name') }}" id="userinput2"
                                                    class="form-control border-primary" placeholder="اسم المالك"
                                                    name="owner_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput2">البريد الإلكتروني</label>
                                                <input type="email" required value="{{ old('email') }}" id="userinput2"
                                                    class="form-control border-primary" placeholder="البريد الإلكتروني"
                                                    name="email">
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput3">رقم الهاتف</label>
                                                <input type="number" value="{{ old('phone') }}" required id="userinput3"
                                                    class="form-control border-primary" placeholder="رقم الهاتف"
                                                    name="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput4">كلمة المرور</label>
                                                <input type="password" required id="userinput4"
                                                    class="form-control border-primary" placeholder="كلمة المرور"
                                                    name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput4"> السجل التجاري</label>
                                                <input type="file" required id="userinput4" value="{{ old('commercial_register') }}"
                                                    class="form-control border-primary" placeholder=" السجل التجاري"
                                                    name="commercial_register">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> المحافظة </label>
                                            <select required class="selectpicker form-control" name="governorate_id" id="governorate_id" data-live-search="true">
                                                <option value="" selected disabled>اختر المحافظة</option>
                                                @foreach ($governments as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br><label> الولاية </label>
                                            <select required class=" form-control" id="state_id" name="state_id" >
                                                <option value="" selected disabled>اختر الولاية</option>

                                            
                                                
                                            </select>
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
      
    });
</script>
@endsection