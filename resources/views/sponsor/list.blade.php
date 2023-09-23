@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 ">
                        <ol class="breadcrumb float-sm-left ">
                            <li class="breadcrumb-item"><a href="{{ route('sponsor.index') }}" class="hover1">Sponsors</a></li>
                            <li class="breadcrumb-item active">List</a></li>
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

                    <div class="card p-0">
                        <div class="card-header p-0">
                            <div class="card-title"></div>
                            <a class="btn btn-primary pull-right" href="{{ route('sponsor.create') }}" class="hover"> + Add
                                Sponsors</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="sponsor-list" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width: 42.934px;">Sl.No</th>
                                        <th> Sponsor Category</th>
                                        <th style="width: 220px;  text-align: center !important;">Sponsor Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('child-scripts')
    <script>
        $(function() {

            var table = $('#sponsor-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('sponsor.index') }}",
                    type: 'GET',
                    data: function(d) {
                        d.event_type = $('#event_type').val();
                        d.to_date = $('#to_date').val();
                        d.from_date = $('#from_date').val();
                    }

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
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'img_path',
                        name: 'img_path'
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
