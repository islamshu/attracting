@extends('layouts.company')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">الطلبات</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">الطلبات
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
                    <h4 class="card-title">الطلبات</h4>
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
                                    <th>اسم المستأجر</th> 
                                    <th>رقم المستأجر</th>                               
                                    <th> الحالة </th>
                                    <th>الإجرائات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders  as $order)


                                    <tr>
                                        <td>{{ $order->worker->name }}</td>

                                        <td>{{ $order->user->name}}</td>
                                        <td>{{ $order->user->phone}}</td>

                                        <td>{{ get_status_booking($order) }}</td>
                                      

                                        <td>
                                            <a class="btn btn-info" href="{{ route('approve.booking',$order->id) }}">تأكيد الحجز</a>
                                            <a href="{{ route('company.orders.show', $order->id) }}"
                                                class="btn btn-icon btn-primary mr-1"> <i
                                                    class="la la-eye"></i></a>
                                         
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