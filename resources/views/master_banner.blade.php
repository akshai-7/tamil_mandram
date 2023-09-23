@extends('app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 ">
                    <ol class="breadcrumb float-sm-left ">
                        <li class="breadcrumb-item"><a href="{{url('sponsors')}}" class="hover1">Sponsors</a></li>
                        <li class="breadcrumb-item active">List</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card p-0">
                    <div class="card-header p-0">
                        <div class="card-title"></div>
                        <a class="btn btn-primary pull-right" href="{{url('sponsor_add')}}" class="hover"> + Add sponsors</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th style="width: 42.934px;">S.No</th>
                                    <th> Sponsor category</th>
                                    <th style="width: 350px;  text-align: center;">Sponsors image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


@php
$img = "";
@endphp

@include('common.file-upload',compact('img'))

@endsection

@push("child-scripts")
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'mm-dd-YYYY'
        });

        var table = $('#bannerTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            dom: 'lBfrtip',
            autoWidth: true,
            orderable: false,
            // "order": [[ 7, 'desc' ]],
            buttons: [{
                extend: "excelHtml5",
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                title: 'Organizations'
            }],
            lengthMenu: [
                [
                    10, 25, 50, -1
                ],
                [10, 25, 50, "All"]
            ],
            // "order": [[ 0, 'desc' ], [ 1, 'desc' ], [2, 'desc'], [3, 'desc']],
            ajax: {
                url: "{{ route('banner.index') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'org_name',
                    name: 'org_name',
                },
                {
                    data: 'org_code',
                    name: 'org_code',
                },

                {
                    data: 'org_email',
                    name: 'org_email',
                },
                {
                    data: 'renewal_due',
                    name: 'renewal_due',
                },


                {
                    data: 'created_at',
                    name: 'created_at'
                },

                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'action',
                    name: 'action ',
                    orderable: true,
                    searchable: false

                },
            ]
        });
    });
</script>
@endpush
