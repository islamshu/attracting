@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">السلايدر</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item active">السلايدر
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
                        <h4 class="card-title">السلايدر</h4>
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
                                        <th> الصورة</th>
                                      
                                        <th> الحالة </th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sliders as $item)


                                        <tr>
                                            <td><img src="{{ asset('uploads/'.$item->image) }}" width="150" height="120" alt=""></td>
                                        <td>
                                                <input type="checkbox" data-id="{{ $item->id }}" name="status"
                                                    class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <a href="{{ route('sliders.edit', $item->id) }}"
                                                    class="btn btn-icon btn-primary mr-1"> <i
                                                        class="la la-edit"></i></a>
                                                <form style="display: inline"
                                                    action="{{ route('sliders.destroy', $item->id) }}" method="post">
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
        $(document).ready(function() {
            $('.js-switch').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let sliderid = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('slider.update.status') }}',
                    data: {
                        'status': status,
                        'sliderid': sliderid
                    },
                    success: function(data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success('Change Successfully');
                    }
                });
            });
        });
    </script>
@endsection
