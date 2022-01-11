@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">الطلب</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('company.orders.index') }}">الطلبات</a>
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
                        
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>اسم المستأجر</label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->user->name  }}">
                                        </div>
                                   
                                        <div class="col-md-6">
                                            <br><label>رقم هاتف المستأجر </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->user->phone  }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>البريد الإلكتروني للمستأجر </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->user->email  }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>اسم العاملة</label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->worker->name  }}">
                                        </div>                                     
                                   
                                        <div class="col-md-6">
                                            <br><label>الراتب </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->worker->salary  }}">
                                        </div>                                     
                                   
                                        <div class="col-md-6">
                                            <br><label>المحافظة </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->worker->govermint->name  }}">
                                        </div>                                     
                           
                                        <div class="col-md-6">
                                            <br><label>الولاية </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->worker->state->name  }}">
                                        </div>                                     
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <br><label>بدأ الحجز في </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->start_at  }}">
                                        </div>   
                                        <div class="col-md-6">
                                            <br><label>ينتهي الحجز في </label>
                                            <input type="text" required class="form-control" readonly name="name" value="{{ $order->finish_at  }}">
                                        </div>                                   
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