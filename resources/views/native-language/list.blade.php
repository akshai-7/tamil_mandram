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
        @include('common.alert-message')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ route('native-language.index') }}">Native Language</a>
                            </li>
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


                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header " style="padding: 0;background-color: #fff;">
                                <div class="card-title "></div>
                                <button type="button" class="btn btn-primary pull-right " data-toggle="modal"
                                    data-target="#modal-lg"> + Add Native Language</button>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="native-lang-list" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th style="width: 42.934px;">Sl.No</th>
                                            <th>Menu Name</th>
                                            <th>Native Name</th>
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

        <div class="modal fade " id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" width=900>
            <div class="modal-dialog modla-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Native Language</h5>
                        <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-native-language" action="{{ route('native-language.store') }}" method="post"
                            class="tabcontent" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            {!! Form::select('menu_id', @$menus, '', [
                                                'class' => 'form-control',
                                                'id' => 'menu_id',
                                                'placeholder' => 'Select Menu',
                                            ]) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Native Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label">Current Status</label>
                                            <div
                                                class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input name="status" type="checkbox" checked class="custom-control-input"
                                                    id="customSwitch3" value="1">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade " id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" width=900>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Native Language</h5>
                        <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php $id = 0; ?>
                        <form id="edit-native-language" action="{{ route('native-language.update', $id) }}" method="post"
                            class="tabcontent" enctype="multipart/form-data" accept-charset="utf-8"
                            novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Menu Name</label>
                                            <input type="hidden" name="id" class="form-control" id="native_id">
                                            {!! Form::select('menu_id', @$menus, '', ['class' => 'form-control', 'id' => 'edit_menu_id']) !!}
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Native Name</label>
                                            <input type="text" class="form-control" name="name" id="edit_name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label">Current Status</label>
                                            <div
                                                class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input name="status" type="checkbox" checked
                                                    class="custom-control-input oldstatus" id="customSwitch4"
                                                    value="1">
                                                <label class="custom-control-label oldstatus" for="customSwitch4"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
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


            $('#modal-lg').on('hidden.bs.modal', function() {
                $("#add-native-language")[0].reset();
                $("#add-native-language").data('validator').resetForm();
                $("#add-native-language").find('.form-control').removeClass('is-invalid');
            });

            $('#modal-edit').on('hidden.bs.modal', function() {
                $("#edit-native-language")[0].reset();
                $("#edit-native-language").data('validator').resetForm();
                $("#edit-native-language").find('.form-control').removeClass('is-invalid');
            });


            $(document).on('click', '.edit_native_language', function(e) {
                e.preventDefault();
                var cat_id = $(this).attr("value");
                $('#modal-edit').modal('show');
                $.ajax({
                    type: "GET",
                    url: '{{ url('/') }}' + "/native-language/" + cat_id + "/edit",
                    success: function(response) {
                        console.log(response);
                        // alert(response);
                        if (response.ststus == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass("alert aert-dander");
                            $('#success_message').text(response.message);
                        } else {
                            $('#native_id').val(response.editOldData.id);
                            $('#edit_name').val(response.editOldData.name);
                            $('#edit_menu_id').val(response.editOldData.menu_id);
                            if (response.editOldData.status == 1) {
                                $('.oldstatus').prop('checked', true);
                            } else {
                                $('.oldstatus').prop('checked', false);
                            }
                        }
                    }
                });
            });


            $(function() {

                var table = $('#native-lang-list').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: 'lBfrtip',
                    buttons: [{
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
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
                    ajax: "{{ route('native-language.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
                            data: 'menu_name',
                            name: 'menu_name'
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

            });


            jQuery.validator.addMethod("lettersonlys", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Please Enter a Letters only, special characters, number, space not allow'")

            $('#add-native-language').validate({
                rules: {
                    menu_id: {
                        required: true,
                        remote: {
                            url: "{{ route('check-menu') }}",
                            type: "post",
                            data: {
                                menu_id: function() {
                                    return $("#menu_id").val();
                                },
                                _token: "{{ csrf_token() }}",
                                // id: $("#user_id").val()
                            }
                        },

                    },
                    name: {
                        required: true,
                        maxlength: 30
                    },
                },
                messages: {
                    menu_id: {
                        required: "Please select menu",
                        remote: "Already menu native language added"

                    },

                    name: {
                        required: "Please enter a native name",
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


            $('#edit-native-language').validate({
                rules: {
                    menu_id: {
                        required: true,
                        remote: {
                            url: "{{ route('check-menu') }}",
                            type: "post",
                            data: {
                                menu_id: function() {
                                    return $("#edit_menu_id").val();
                                },
                                _token: "{{ csrf_token() }}",
                                id: function() {
                                    return $("#native_id").val();
                                },
                            }
                        },

                    },
                    name: {
                        required: true,
                        maxlength: 30
                    },
                },
                messages: {
                    menu_id: {
                        required: "Please select menu",
                        remote: "Already menu native language added"

                    },

                    name: {
                        required: "Please enter a native name",
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
