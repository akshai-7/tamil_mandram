@extends('app')
@section('content')
    <style>
        .card-header:first-child {
            padding: 0 !important;
        }

        .card-title {
            padding: 7px;
        }

        .dataTables_wrapper .buttons-excel {
            background: #004890;
            /* border: 0px; */
            /* float: none; */
            /* text-align: center; */
            margin-top: -38px;
            margin-left: 20px;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            margin-top: -38px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('organization') }}">Organizations</a></li>
                            <li class="breadcrumb-item active"><a> List</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <?php if (Session::has('success')) : ?>
            <div class="container" style="margin-top: 15px;">
                <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                </div>
            </div>
            <?php endif; ?>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <!-- /.card-header -->
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header " style="background-color: #fff;">
                                    <div class="card-title"></div>
                                    <a href="{{ url('organization/create') }}" class="btn btn-primary pull-right"> + Add
                                        Organization</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="organization_table" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Org. Name</th>
                                                <th>Org. Code</th>
                                                <th>Email ID</th>
                                                <th>Renewal due</th>
                                                <th>Created date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
    </div>
@endsection

@push('child-scripts')
    <script type="text/javascript">
        $(function() {

            var table = $('#organization_table').DataTable({
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
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
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
                    url: "{{ route('organization.index') }}",
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
