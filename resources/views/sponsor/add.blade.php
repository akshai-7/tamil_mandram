@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('sponsor.index') }}" class="hover1"> Sponsors</li>
                            <li class="breadcrumb-item active "> &nbsp; / <a> Add Sponsor </a></li>
                        </ol>
                        <a class="btn btn-primary  pull-right" href="{{ route('sponsor.index') }}">Back</a>
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
                                <div class="card-title"> Add Sponsor </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="add_sponsor" action="{{ route('sponsor.store') }}" method="post">
                                @csrf
                                <div class="row" style="padding: 15px;">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Sponsor Category</label>
                                            {!! Form::select('category_id', @$categories, null, [
                                                'class' => 'form-control',
                                                'id' => 'category_id',
                                                'placeholder' => 'Select Category',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image Upload <span style="color: grey">(Minimum
                                                    image resolution 500 X 500
                                                    px)</span></label>
                                            <div class="input-group">
                                                <input name="image" id="file-input" class="form-control" accept="image/*"
                                                    class="" type="file" data-error="#errNm1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <img class="cropped  preview-img  no-broder" data-toggle="modal"
                                            data-target="#getCroppedCanvasModal"
                                            src="{{ asset('/public/assets/dist/img/photo.png') }}" alt="">
                                        <input type="hidden" name="image_src" value="" class="hidden-preview-img">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category_id">Link</label>
                                            {!! Form::text('url_link', null, ['class' => 'form-control', 'id' => 'url_link', 'placeholder' => 'https://']) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control summernote" name="description" id="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label">Current Status</label>
                                            <div
                                                class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" name="status" checked class="custom-control-input"
                                                    id="customSwitch3" value="1">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary pull-right col-md-4 ">Submit</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
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


        $('#add_sponsor').validate({
            rules: {
                category_id: {
                    required: true
                },
                url_link: {
                    required: true,
                    url: true
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

                url_link: {
                    required: "Please enter a url"
                },

                category_id: {
                    required: "Please select category."
                },
                description: {
                    required: "Please enter a description."
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
            //     if ($('#description').summernote('isEmpty')) { //using id
            //         console.log("sdf");
            //         alert('Description is empty');
            //     } else {
            //         form.submit();
            //     }
            // }
        });
    </script>
@endpush
