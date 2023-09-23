@extends('app')
@section('content')
    <style>
        .dataTables_wrapper .buttons-excel {
            background: #004890;
            border: 0px;
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
        <section class="content">
            <?php if (Session::has('success')) : ?>
            <div class="container" style="margin-top: 15px;">
                <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Content Header (Page header) -->
            <section class="content-header">

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-12">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="{{ url('category') }}">Sponsors Category</a></li>
                                <li class="breadcrumb-item active"><a> List</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div id="success_message"></div>

                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header " style="padding: 0;background-color: #fff;">
                                    <div class="card-title "></div>
                                    <!-- <button type="button" class="btn btn-primary pull-right " data-toggle="modal" data-target="#modal-lg"> + Add Language</button> -->

                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="learningPathDataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th> Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>



            <div class="modal fade " id="edit-language" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true" width=900>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php $id = 0; ?>
                            <form id="categoryEdit" action="{{ route('category.update', $id) }}" method="post"
                                class="tabcontent" enctype="multipart/form-data" accept-charset="utf-8"
                                novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="hidden" name="id" class="form-control" id="edit_id">
                                                <input type="text" name="name" value="" id="name"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Current Status</label>
                                                <div
                                                    class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input oldstatus"
                                                        name="oldstatus" id="oldstatus" value="1">
                                                    <label class="custom-control-label oldstatus" for="oldstatus"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
@push('child-scripts')
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(document).on("click", ".oldstatus", function(e) {

                if ($("#oldstatus").is(":checked")) {
                    $("#oldstatus").attr("checked", false);
                    $("#oldstatus").attr("value", 1);
                } else {
                    $("#oldstatus").attr("checked", true);
                    $("#oldstatus").attr("value", 0);
                }

                if ($("#new_status").is(":checked")) {
                    $("#new_status").attr("checked", false);
                } else {
                    $("#new_status").attr("checked", true);
                }
            });

            $('#modal-lg').on('hidden.bs.modal', function() {
                $("#languageadd")[0].reset();
                $("#languageadd").data('validator').resetForm();
                $("#languageadd").find('.form-control').removeClass('is-invalid');
            });

            $('#edit-language').on('hidden.bs.modal', function() {
                $("#categoryEdit")[0].reset();
                $("#categoryEdit").data('validator').resetForm();
                $("#categoryEdit").find('.form-control').removeClass('is-invalid');
            });


            $(document).on('click', '.edit_category', function(e) {
                e.preventDefault();
                var cat_id = $(this).val();
                // alert(cat_id);
                console.log(cat_id);
                $('#edit-language').modal('show');
                $.ajax({
                    type: "GET",
                    url: '{{ url('/') }}' + "/category/" + cat_id + "/edit",
                    success: function(response) {
                        console.log(response);
                        // alert(response);
                        if (response.ststus == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass("alert aert-dander");
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_id').val(response.editOldData.id);
                            $('#name').val(response.editOldData.name);
                            if (response.editOldData.status == 1) {
                                $('.oldstatus').val(response.editOldData.status).prop('checked',
                                    true);
                            } else {
                                $('.oldstatus').val(response.editOldData.status).prop('checked',
                                    false);
                            }
                        }
                    }
                });
            });


            $(function() {

                var table = $('#learningPathDataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: 'lBfrtip',
                    buttons: [{
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1]
                        },
                        title: 'Languages'
                    }],
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
                    lengthMenu: [
                        [
                            10, 25, 50, -1
                        ],
                        [10, 25, 50, "All"]
                    ],
                    ajax: "{{ route('category.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
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

            });


            jQuery.validator.addMethod("lettersonlys", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Please Enter a Letters only, special characters, number, space not allow'")

            $('#languageadd').validate({
                rules: {
                    language: {
                        required: true,
                        // lettersonlys: true,
                        maxlength: 30

                    },
                },
                messages: {
                    language: {
                        required: "Please enter language"
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
                }
            });



            $('#categoryEdit').validate({
                rules: {
                    name: {
                        required: true,
                        // lettersonlys: true,
                        maxlength: 30
                    },
                },
                messages: {
                    name: {
                        required: "Please enter language",
                        remote: "Already language exists.!"
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
                }
            });
            //validation add end//
        });
    </script>
@endpush
