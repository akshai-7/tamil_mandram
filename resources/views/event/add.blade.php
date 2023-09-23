@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('event.index') }}" class="hover1">Upcoming Events
                            </li>
                            <li class="breadcrumb-item active "> &nbsp; / <a> Add Event </a></li>
                        </ol>
                        <a class="btn btn-primary  pull-right" href="{{ route('event.index') }}">Back</a>
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
                                <div class="card-title"> Add Event </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('event.store') }}" method="post" id="add_event">
                                @csrf
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Event Title</label>
                                                <input type="text" name="event_title" id="event_title"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Event Date</label>
                                                <input type="text" name="event_date" id="event_date"
                                                    class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control summernote" name="event_description" id="event_description"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Event Photo Upload</label>
                                                <div class="input-group">
                                                    <input name="image" id="file-input" accept="image/*" class=""
                                                        type="file" data-error="#errNm1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img class="cropped  preview-img  no-broder" data-toggle="modal"
                                                data-target="#getCroppedCanvasModal"
                                                src="{{ asset('/public/assets/dist/img/photo.png') }}" alt="">
                                            <input type="hidden" name="image_src" value=""
                                                class="hidden-preview-img">
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Photo Gallery Link</label>
                                                <input type="text" name="event_photo_gallery_link"
                                                    id="event_photo_gallery_link" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Buy Ticket Link</label>
                                                <input type="text" name="event_by_ticket_link" id="event_by_ticket_link"
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-5 ">
                                            <div class="form-group">
                                                <label class="label">Current Status</label>
                                                <div
                                                    class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" name="status" checked
                                                        class="custom-control-input" id="customSwitch3" value="1">
                                                    <label class="custom-control-label" for="customSwitch3"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4 offset-md-4 mt-5">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary col-md-5">
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
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
    <script>
        $('#event_date').datepicker({
            format: 'mm-dd-YYYY',
            starDate: "+0d"
        });


        $('#add_event').validate({
            rules: {
                event_title: {
                    maxlength: 50,
                    required: true
                },
                event_date: {
                    required: true
                },
                event_description: {
                    required: true
                },


                event_photo_gallery_link: {
                    required: true,
                    url: true
                },
                event_by_ticket_link: {
                    required: true,
                    url: true
                },
                image: {
                    required: true,
                    accept: "image/jpg,image/jpeg,image/png",
                }
            },
            messages: {

                event_title: {
                    required: "Please enter an event name."
                },
                event_date: {
                    required: "Please enter an event date."
                },

                event_photo_gallery_link: {
                    required: "Please enter a photo gallery link."
                },
                event_by_ticket_link: {
                    required: "Please enter a ticket link.",
                },

                event_description: {
                    required: "Please enter a description."
                },
                URL: {
                    required: "Please enter video URL",
                    url: "URL only allowed"
                },
                image: {
                    required: "Please select event image",
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

            // submitHandler: function(form) {

            //     console.log("sdf");
            //     if ($('#event_description').summernote('isEmpty')) { //using id
            //         console.log("sdf");
            //         alert('Event description is empty');
            //     } else {
            //         form.submit();
            //     }
            // }
        });
    </script>
@endpush
