@extends('app')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
                            <li class="breadcrumb-item active"><a> List</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            @include('common.alert-message')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header " style="padding: 0;background-color: #fff;">
                                <div class="card-title "></div>
                                <a href="{{ route('news.create') }}" class="btn btn-primary pull-right "> + Add News<a>

                            </div>

                            <div class="card-body">
                                <table id="news" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th style="width: 42.934px;">Sl.No</th>
                                            <th>Title</th>
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

    </div>
@endsection

@push('child-scripts')
    <script>
        $(function() {

            var table = $('#news').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('news.index') }}",
                    type: 'GET',
                },
                language: {
                    emptyTable: "No Data Available",
                    zeroRecords: "No Matching Records Found",
                    info: "Showing _START_ to _END_ of _TOTAL_ Entries",
                    infoEmpty: "Showing 0 to 0 of 0 Entries",
                    infoFiltered: "(Filtered From _MAX_ Total Entries)",
                    lengthMenu: "Show _MENU_ Entries",
                    loadingRecords: "Loading...",
                    search: "Search:",
                    processing: "Processing",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },

                ]
            });

            $('#search-form').on('submit', function(e) {
                table.draw();
                e.preventDefault();
            });

            $('#search-form').on('reset', function(e) {
                $('.select2').trigger('change');
                setTimeout(function() {
                    $('.select2').trigger('change');
                    table.draw();
                }, 100);

            });
        });
    </script>
@endpush
