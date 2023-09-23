@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('executive-committee.index') }}"
                                    class="hover1">Executive Committee</li>
                            <li class="breadcrumb-item active"><a data-original-title="" title=""> / Add</a></li>
                        </ol>
                        <a class="btn btn-primary  pull-right" href="{{ route('executive-committee.index') }}">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card ">
                            <div class="card-header card-custom-header">
                                <div class="card-title"> Add Executive Committee</div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('executive-committee.store') }}" method="post" id="add_e_event">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Designation</label>
                                                <input type="text" name="designation" id="designation"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo Upload</label>
                                                <div class="input-group">
                                                    <input class="form-control" name="image" id="file-input"
                                                        accept="image/*" class="" type="file" data-error="#errNm1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 mt-2">
                                            <img class="cropped  preview-img  no-broder" data-toggle="modal"
                                                data-target="#getCroppedCanvasModal"
                                                src="{{ asset('/public/assets/dist/img/photo.png') }}" alt="">
                                            <input type="hidden" name="image_src" value=""
                                                class="hidden-preview-img">
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control summernote" id="description"></textarea>
                                            </div>
                                            {{-- <span id="error_description" class="error invalid-feedback">Please enter a
                                                description.
                                            </span> --}}
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label">Current Status</label>
                                                <div
                                                    class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" name="status" checked
                                                        class="custom-control-input" id="customSwitch3">
                                                    <label class="custom-control-label" for="customSwitch3"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <button type="submit"
                                                class="btn btn-primary pull-right col-md-4 ">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@php
    $img = '';
@endphp
@include('common.file-upload', compact('img'))


@push('child-scripts')
    {{-- <script>
        // var name = $("#description").val();
        // if (name === "") {
        //     $("#error_description").text("Please enter a description.");
        //     isValid = false;
        // }




        $('#datepicker').datepicker({
            format: 'mm-dd-YYYY',
            starDate: "+0d"
        });

        $('#add_e_event').validate({
            rules: {
                name: {
                    maxlength: 50,
                    required: true
                },
                designation: {
                    maxlength: 50,
                    required: true
                },

                description: {
                    required: true

                },
                error_description: {
                    required: true

                },

                image: {
                    required: true,
                    accept: "image/jpg,image/jpeg,image/png",
                },

            },
            messages: {

                event_title: {
                    required: "Please enter a name."
                },

                name: {
                    required: "Please enter a name."
                },
                designation: {
                    required: "Please enter a designation."
                },

                description: {
                    required: "Please enter a description."
                },
                error_description: {
                    required: "Please enter a description."
                },


                image: {
                    required: "Please select image",
                    accept: "jpg ,jpeg ,png formate only allowed",
                    // filesize: "Must be file size 1mb  only allowed!"
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
            // submitHandler: function(form) {
            //     console.log("sdf");
            //     if ($('#description').summernote('isEmpty')) { //using id
            //         // console.log("sdf");
            //         // alert('Description is empty');

            //     } else {
            //         form.submit();
            //     }
            // }


        });
    </script> --}}

    <script>
        $('#datepicker').datepicker({
            format: 'mm-dd-YYYY',
            starDate: "+0d"
        });

        $('#add_e_event').validate({
            rules: {
                name: {
                    maxlength: 50,
                    required: true
                },
                designation: {
                    maxlength: 50,
                    required: true
                },
                description: {
                    required: true
                },
                image: {
                    required: true,
                    accept: "image/jpg,image/jpeg,image/png",
                },


            },
            messages: {


                name: {
                    required: "Please enter a name."
                },
                designation: {
                    required: "Please enter a designation."
                },

                description: {
                    required: "Please enter a description."
                },
                image: {
                    required: "Please select image",
                    accept: "jpg ,jpeg ,png formate only allowed",
                    // filesize: "Must be file size 1mb  only allowed!"
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
            ignore: ":hidden:not(.summernote),.note-editable.panel-body",
        });
    </script>
@endpush
