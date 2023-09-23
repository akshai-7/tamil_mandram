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
                            <li class="breadcrumb-item"><a href="{{ route('event.index') }}">Upcoming Events</a></li>
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

                        <div class="card collapsed-card search-card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Search Events</h4>
                                </div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-primary" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                <form id="search-form">
                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Event Type</label>
                                                <select class="form-control select2" name="event_type" id="event_type">
                                                    <option>Select Type</option>
                                                    <option value="1"> Upcoming </option>
                                                    <option value="2"> Past </option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> From Date</label>
                                                <input type="text" class="form-control datepicker" name="from_date"
                                                    id="from_date">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> To Date</label>
                                                <input type="text" class="form-control datepicker" name="to_date"
                                                    id="to_date">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group mt-4">
                                                <label></label>
                                                <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header " style="padding: 0;background-color: #fff;">
                                <div class="card-title "></div>
                                <a href="{{ route('event.create') }}" class="btn btn-primary pull-right "> + Add Event<a>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="event-list" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th style="width: 42.934px;">Sl.No</th>
                                            <th>Event Type</th>
                                            <th>Event Title</th>
                                            <th>Event Date</th>
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

            var table = $('#event-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('event.index') }}",
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
                        data: 'event_type',
                        name: 'event_type'
                    },
                    {
                        data: 'event_name',
                        name: 'event_name'
                    },
                    {
                        data: 'event_date',
                        name: 'event_date'
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
