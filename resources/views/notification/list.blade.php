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
                            <li class="breadcrumb-item"><a href="{{ url('send-notification') }}">Send Notification</a></li>
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


                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header " style="padding: 0;background-color: #fff;">
                                <div class="card-title "></div>
                                <button type="button" class="btn btn-primary pull-right " data-toggle="modal"
                                    data-target="#modal-lg"> + Send Notification</button>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="send-notification" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th style="width: 42.934px;">Sl.No</th>
                                            <th>Event Name</th>
                                            <th>Message</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
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

        <div class="modal fade " id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" width=900>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Notification</h5>
                        <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('send-notification.store') }}" id="add_send_notification" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Title <span style="color: grey">(Maximum characters 30)</span></label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <input type="text" name="message" id="message" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary " id="add_form_submit"><i class="fas fa-send"></i>
                            Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade " id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" width=900>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Notification</h5>
                        <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php $id = 0; ?>
                        <form id="edit_send_notifications" action="{{ route('send-notification.update', $id) }}"
                            method="post" class="tabcontent" enctype="multipart/form-data" accept-charset="utf-8"
                            novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Title <span style="color: grey">(Maximum characters 30)</span></label>
                                            <input type="hidden" name="id" id="edit_id" value="">
                                            <input type="text" name="title" id="edit_title" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <input type="text" name="message" id="edit_message" class="form-control"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-send"></i> Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        $(document).ready(function() {



            var table = $('#send-notification').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('send-notification.index') }}",
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
                        data: 'title',
                        name: 'category_name'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ]
            });


            $(document).on('click', '.edit_send_notification', function(e) {
                e.preventDefault();
                var cat_id = $(this).val();
                // alert(cat_id);
                console.log(cat_id);
                $('#modal-edit').modal('show');
                $.ajax({
                    type: "GET",
                    url: '{{ url('/') }}' + "/send-notification/" + cat_id + "/edit",
                    success: function(response) {
                        console.log(response);
                        // alert(response);
                        if (response.ststus == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass("alert aert-dander");
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_id').val(response.editOldData.id);
                            $('#edit_title').val(response.editOldData.title);
                            $('#edit_message').val(response.editOldData.message);
                        }
                    }
                });
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

            $('#add_send_notification').validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 30
                    },
                    message: {
                        required: true,
                        maxlength: 170
                    }
                },
                messages: {

                    title: {
                        required: "Please enter a title"
                    },
                    message: {
                        required: "Please enter a message"
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {

                    $('#modal-lg').modal('toggle'); //or  $('#IDModal').modal('hide');

                    return true;
                }

            });

            $('#edit_send_notifications').validate({
                rules: {
                    title: {
                        required: true
                    },
                    message: {
                        required: true
                    }
                },
                messages: {

                    title: {
                        required: "Please enter a title"
                    },
                    message: {
                        required: "Please enter a message"
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $('#modal-edit').modal('toggle'); //or  $('#IDModal').modal('hide');
                    return true;
                }
            });
        });
    </script>
@endpush
