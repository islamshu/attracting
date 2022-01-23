@extends('layouts.backend')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">خطوات العمل</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item active">خطوات العمل
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
                        <h4 class="card-title">خطوات العمل</h4>
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
                                        <th>العنوان</th>
                                        <th>الترتيب</th>
                                 
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody class="sort_menu">
                                    @foreach ($works as $item)
                                   
        
                                        <tr data-id="{{$item->id}}" >
                                            
        
                                            <td ><span  class="handle"  ></span></td>
                                            <td >{{ $item->title }}</td>
        
                                            <td >
                                                <a href="{{ route('how_its_work.edit', $item->id) }}"
                                                    class="btn btn-icon btn-primary mr-1"> <i
                                                        class="la la-edit"></i></a>
                                                <form style="display: inline"
                                                    action="{{ route('how_its_work.destroy', $item->id) }}" method="post">
                                                    @csrf @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-icon btn-danger mr-1 delete-confirm"><i
                                                            class="la la-trash"></i></button>
                                                </form>
                                            </td>
                                      
                                        </tr>
                                   
                                    @endforeach
                                </tbody>
                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .handle {
            min-width: 18px;
            background: #607D8B;
            height: 15px;
            display: inline-block;
            cursor: move;
            margin-right: 10px;
        }

    </style>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            function updateToDatabase(idString) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: '{{ route('work_update') }}',
                    method: 'POST',
                    data: {
                        ids: idString
                    },
                    success: function() {
                        alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }

            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function(e, ui) {
                    var sortData = target.sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join(','))
                }
            })

        })
    </script>
@endsection

