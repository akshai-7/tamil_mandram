@extends('app')
@section('content')
    <style>
        .page {
            margin: 1em auto;
            max-width: 768px;
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
            height: 100%;
        }

        .box {
            padding: 0.5em;
            width: 100%;
            margin: 0.5em;
        }

        .box-2 {
            padding: 0.5em;
            width: calc(100%/2 - 1em);
        }

        .options label,
        .options input {
            width: 4em;
            padding: 0.5em 1em;
        }



        .hide {
            display: none;
        }

        img {
            max-width: 100%;
        }


        .center {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .form-input {
            width: 350px;
            padding: 20px;
            background: #fff;
            box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                3px 3px 7px rgba(94, 104, 121, 0.377);
        }

        .form-input input {
            display: none;

        }


        .form-input img {
            width: 100%;
            display: none;

            margin-bottom: 30px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('organization') }}" class="hover1">Organizations </a>
                            </li>
                            <li class="breadcrumb-item active">Add Organization </a></li>
                        </ol>
                        <a class="btn btn-primary  pull-right" href="{{ url('organization') }}">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-custom-header">
                                <div class="card-title">Add Organization </div>
                            </div>
                            <div class="card-body">
                                <form id="orginatitionadd" action="{{ route('organization.store') }}" class="tabcontent"
                                    method="POST" enctype="multipart/form-data" accept-charset="utf-8"
                                    novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Organization name</label>
                                                <input type="text" name="org_name" class="form-control" id="org_name"
                                                    placeholder="Organization name" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Organization code</label>
                                                <input type="text" name="org_code" class="form-control" id="org_code"
                                                    placeholder="Organization code" readOnly value="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Email id</label>
                                                <input type="email" name="org_email" class="form-control" id="org_email"
                                                    placeholder="Email id" value="">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label">Mobile number</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Mobile Number"
                                                        value="" id="u_mobile_no" name="u_mobile_no">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subscription</label>
                                                <select class="form-control" name="subscription_type"
                                                    id="subscription_type">
                                                    <option value=""> Select type</option>
                                                    <option value="1"> Monthly</option>
                                                    <option value="2"> Annually</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Logo upload <span style="color: grey">(Minimum
                                                        image resolution 500 X 500
                                                        px)</span></label>
                                                <div class="input-group">
                                                    <input name="image" id="file-input"
                                                        accept="image/jpg,image/jpeg,image/png" class="form-control"
                                                        type="file" data-error="#errNm1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 mt-3 ml-4">
                                            <img class="cropped  preview-img  no-broder" data-toggle="modal"
                                                data-target="#getCroppedCanvasModal"
                                                src="{{ asset('/public/assets/dist/img/photo.png') }}" src=""
                                                alt="">
                                            <input type="hidden" name="image_src" value=""
                                                class="hidden-preview-img">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Next renewal date </label>
                                                <div class="input-group date">
                                                    <input type="text" name="next_renewal_date"
                                                        class="form-control datepicker" id="next_renewal_date"
                                                        placeholder="Next renewal date" value="" readonly>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text bg-light d-block">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Address</label>
                                                <textarea name="address" id="address" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3 ">
                                            <label>Current Status</label>
                                            <div class="form-group">
                                                <div
                                                    class="custom-control lg-btn custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" name="status" checked
                                                        class="custom-control-input" name="status" id="status"
                                                        value="1">
                                                    <label class="custom-control-label no-change status"
                                                        for="status"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="row">
                                        <div class="col-md-7 mt-3">
                                            <button type="submit"
                                                class="btn btn-primary pull-right col-md-4">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @php
        $img = '';
    @endphp


    @include('common.file-upload', compact('img'))
@endsection
@push('child-scripts')
    <script>
        $(document).ready(function() {


            $("#next_renewal_date").datepicker({
                format: "DD-MM-YYYY",
                startDate: "+0day"
            })
            var LastOrgCode = "{{ $LastOrgCode }}";
            $(document).on("keyup", "#org_name", function() {
                var org_name = $(this).val().toUpperCase();

                if (org_name) {
                    org_name = org_name.substr(0, 3);
                    console.log(org_name.length);
                    if (org_name.length >= 3) {
                        $("#org_code").val(org_name + LastOrgCode);
                    } else {
                        $("#org_code").val("");
                    }
                }
            });

            $(document).on("click", ".status", function(e) {
                e.stopPropagation();
                if ($("#status").is(":checked")) {
                    $("#status").attr("checked", false);
                } else {
                    $("#status").attr("checked", true);
                }
            });

            $(document).on("change", "#subscription_type", function() {
                var dateString = '';
                var date = new Date();

                if ($(this).val()) {
                    if ($(this).val() == "1") {
                        date.setDate(date.getDate() + 30);
                        dateString = date;
                        console.log(dateString);

                    } else if ($(this).val() == "2") {
                        date.setDate(date.getDate() + 365);
                        dateString = date;
                    }

                    var date = new Date(dateString).getDate();
                    var month = new Date(dateString).getMonth() + 1;
                    var year = new Date(dateString).getFullYear();
                    console.log(date + 1);
                    console.log(month + 1);
                    console.log(year);
                    $("#next_renewal_date").val(date + "-" + month + "-" + year);
                }

            })




            $("#org_contract_expiry_date").datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'm-d-YYYY',
            });


            $.validator.addMethod("password", function(value, element) {
                let password = value;
                if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(password))) {
                    return false;
                }
                return true;
            }, function(value, element) {
                let password = $(element).val();
                if (!(/^(.{8,20}$)/.test(password))) {
                    return 'Password must be between 8 to 20 characters long.';
                } else if (!(/^(?=.*[A-Z])/.test(password))) {
                    return 'Password must contain at least one uppercase.';
                } else if (!(/^(?=.*[a-z])/.test(password))) {
                    return 'Password must contain at least one lowercase.';
                } else if (!(/^(?=.*[0-9])/.test(password))) {
                    return 'Password must contain at least one digit.';
                } else if (!(/^(?=.*[@#$%&])/.test(password))) {
                    return "Password must contain special characters from @#$%&.";
                }
                return false;
            });
            jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {

                return element.files ? !element.files[0] || (element.files[0].size <= limit) : true;
            }, 'File is too big.Please upload below 2MB Image file.');

            $('#orginatitionadd').validate({
                rules: {
                    org_name: {
                        required: true,
                        maxlength: 30,
                        lettersonly: false,
                    },

                    next_renewal_date: {
                        required: true,
                    },

                    mobile_number: {
                        required: true,
                    },
                    org_code: {
                        required: true,
                    },

                    address: {
                        required: true,
                        maxlength: 300,
                    },

                    "subscription_type": {
                        required: true,
                    },
                    org_email: {
                        required: true,
                        email: true,
                        maxlength: 100,
                        remote: {
                            url: "{{ route('check-email') }}",
                            type: "post",
                            data: {
                                email: function() {
                                    return $("#org_email").val();
                                },
                                _token: "{{ csrf_token() }}",
                            }
                        },

                    },
                    image: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png",
                        fileSizeLimit: "2097152"
                    },

                    u_mobile_no: {
                        required: true,
                        number: true,
                        maxlength: 10,
                        remote: {
                            url: "{{ route('check-mobile-no') }}",
                            type: "post",
                            data: {
                                mobile_no: function() {
                                    return $("#u_mobile_no").val();
                                },
                                _token: "{{ csrf_token() }}"
                            }
                        },
                    },


                },
                messages: {
                    org_name: {
                        required: "Please enter organization name.",
                        maxlength: "Must be 30 characters only allowed.",
                    },
                    org_code: {
                        required: "Please enter  organization code."
                    },
                    mobile_number: {
                        required: "Please enter mobile number",
                    },
                    address: {
                        required: "Please enter address."
                    },

                    "subscription_type": {
                        required: "Please select subscription type."
                    },

                    next_renewal_date: {
                        required: "Please select next renewal date.",
                    },

                    org_email: {
                        required: "Please enter email id.",
                        remote: "Email Already exists.",
                        maxlength: "Must be 100 characters only allowed.",
                    },
                    image: {
                        required: "Please select Organization image.",
                        accept: "jpg ,jpeg ,png formate only allowed.",
                    },

                    u_mobile_no: {
                        required: "Please enter phone number",
                        number: "Numbers only allowed",
                        remote: "Mobile No Already exists..!",
                        maxlength: "Must be 10 characters only allowed!"
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
        });
    </script>
@endpush
<!-- /.content -->
