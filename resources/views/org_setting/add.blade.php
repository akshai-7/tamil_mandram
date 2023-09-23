@extends('app')
@section('content')
    <link rel="stylesheet" media="screen" type="text/css" href="{{ asset('/public/assets/build/css/colorpicker.css') }}" />


    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('organization-setting') }}" class="hover1">
                                    Settings</li>
                            <li class="breadcrumb-item active "> &nbsp; / <a> Mobile App Color Setting </a></li>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card ">
                            <div class="card-header card-custom-header">
                                <div class="card-title"> Mobile App Color Setting </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('org-color-setting-save') }}" id="color-setting" method="post"
                                method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-6">

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Header Color</label>
                                                    <input type="text" name="header_color" id="colorpickerField1"
                                                        class="form-control  colorpickerField1 color-picker"
                                                        value="{{ $data->header_color ? $data->header_color : 'FFFFFF' }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Body Color</label>
                                                    <input type="text" name="body_color" id="colorpickerField2"
                                                        class="form-control  colorpickerField2 color-picker"
                                                        value="{{ $data->body_color ? $data->body_color : 'F9F9F9' }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Footer Color</label>
                                                    <input type="text" name="footer_color" id="colorpickerField3"
                                                        class="form-control  colorpickerField3 color-picker"
                                                        value="{{ $data->footer_color ? $data->footer_color : '5C64F7' }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mt-3">
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary col-md-3">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div @if (!@$data->header_color) style="width: 280px;height: 52px;background: #FFFFFF;border: 1px solid #ccc;"
                                                    @else style="width: 280px;height: 52px;background:#<?php echo @$data->header_color; ?>; border: 1px solid #ccc;" @endif
                                                        class="text-center" id="head_bg_color">
                                                        <p class="mt-2"> Header </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div @if (!@$data->body_color) style="width: 280px;height: 180px;background: #f9f9f9;border: 1px solid #ccc;"
                                                    @else style="width: 280px;height: 180px;background:#<?php echo @$data->body_color; ?>; border: 1px solid #ccc;" @endif
                                                        class="text-center" id="body_bg_color">
                                                        <p class="mt-5 "> Body </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div @if (!@$data->footer_color) style="width: 280px;height: 52px;background: #5C64F7;border: 1px solid #ccc;"
                                                    @else style="width: 280px;height: 52px;background:#<?php echo @$data->footer_color; ?>;border: 1px solid #ccc;" @endif
                                                        class="text-center" id="footer_bg_color">
                                                        <p class="mt-2"> Footer </p>
                                                    </div>
                                                </div>
                                            </div>..
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-12 d-none">
                        <!-- jquery validation -->
                        <div class="card ">
                            <div class="card-header card-custom-header">
                                <div class="card-title"> About Us Descriptions </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('org-aboutUs-save') }}" id="aboutUs-setting" method="post"
                                method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="col-md-10 offset-md-1">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="about_us" id="about_us" class="form-control">{{ @$data->about_us }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mt-3">
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary col-md-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card -->
    </div>

    </div>
    </div>
    </section>

    <!-- /.content -->
    </div>
    </div>
@endsection
@push('child-scripts')
    <script src="{{ asset('/public/assets/build/js/colorpicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
                    onSubmit: function(hsb, hex, rgb, el) {
                        console.log("sdfsds");
                        $(el).val(hex);
                        $(el).ColorPickerHide();
                        if ($(el).hasClass("colorpickerField1")) {
                            $("#head_bg_color").css("background", "#" + hex);
                        } else if ($(el).hasClass("colorpickerField2")) {
                            $("#body_bg_color").css("background", "#" + hex);
                        } else if ($(el).hasClass("colorpickerField3")) {
                            $("#footer_bg_color").css("background", "#" + hex);
                        }
                    },
                    onBeforeShow: function(el) {
                        console.log("AAAA");
                        $(this).ColorPickerSetColor(this.value);
                    }
                })
                .bind('keyup', function() {
                    console.log("sdf");
                    $(this).ColorPickerSetColor(this.value);
                });

            $('#color-setting').validate({
                rules: {
                    header_color: {
                        required: true
                    },
                    body_color: {
                        required: true
                    },
                    footer_color: {
                        required: true
                    }
                },
                messages: {

                    header_color: {
                        required: "Please enter a header color."
                    },
                    body_color: {
                        required: "Please enter a body color."
                    },
                    footer_color: {
                        required: "Please enter a body color."
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

            });

            $('#aboutUs-setting').validate({
                rules: {
                    "about_us": {
                        required: true,
                        maxlength: 130
                    }
                },
                messages: {

                    "about_us": {
                        required: "Please enter a descriptions."
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

            });

        });
    </script>
@endpush
