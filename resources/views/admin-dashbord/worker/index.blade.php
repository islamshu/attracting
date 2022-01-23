@extends('layouts.backend')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">العاملات</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">العاملات
                    </li>

                </ol>
            </div>
        </div>
    </div>

</div>
<!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">العاملات</h4>
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
                    <div class="card-body card-dashboard">
                        @include('inc.alerts.error')
                        @include('inc.alerts.success')

                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>اسم العامل</th>
                                    <th>مكتب العمل </th>
                                    <th> رقم مكتب العمل </th>
                                    <th> الحالة </th>
                                    <th>تفعيل / الغاء التفعيل</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($workers  as $work)


                                    <tr>
                                        <td>{{ $work->name }}</td>

                                        <td>{{ $work->company->company_name }}</td>
                                        <td>{{ $work->company->phone }}</td>
                                        <td>
                                            {{ get_status_worker_all($work)  }}
                                        </td>
                                        <td>
                                            <input type="checkbox" data-id="{{ $work->id }}" name="status" class="js-switch" {{ $work->is_show == 1 ? 'checked' : '' }}>
                                            </td>
                                       
                                        

                                        <td>

                                           
                                            <a target="_blank" href=" {{ route('get_single_work',encrypt($work->id)) }}"
                                                class="btn btn-icon btn-info mr-1"> <i
                                                    class="la la-eye"></i></a>
                                            <a href="{{ route('workers.edit', $work->id) }}"
                                                class="btn btn-icon btn-primary mr-1"> <i
                                                    class="la la-edit"></i></a>
                                            <form style="display: inline"
                                                action="{{ route('workers.destroy', $work->id) }}" method="post">
                                                @csrf @method('delete')
                                                <button type="submit"
                                                    class="btn btn-icon btn-danger mr-1 delete-confirm"><i
                                                        class="la la-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('wroker.update_status') }}',
            data: {'status': status, 'id': id},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
@endsection