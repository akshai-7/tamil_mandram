@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('by-law.index') }}" class="hover1">By-Laws</li>
                            <li class="breadcrumb-item active "> &nbsp; / <a> Edit By-Laws </a></li>
                        </ol>
                        <a class="btn btn-primary  pull-right" href="{{ route('by-law.index') }}">Back</a>
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
                                <div class="card-title"> Edit By-Laws </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="add_by_law" method="POST" action="{{ route('by-law.update', encrypt($data->id)) }}"
                                class="tabcontent" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label> Title</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ @$data->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo Upload <span
                                                        style="color: grey">(Minimum image resolution 500 X 500
                                                        px)</span></label>
                                                <div class="input-group">
                                                    <input name="image" id="file-input" accept="image/*"
                                                        class="form-control" type="file" data-error="#errNm1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img class="cropped lg preview-img no-broder" data-toggle="modal"
                                                data-target="#getCroppedCanvasModal"
                                                src="data:image/png;base64,{!! $fileDecrypt !!}" alt="" />
                                            <input type="hidden" name="image_src" value=""
                                                class="hidden-preview-img">
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="description" name="description" class="form-control summernote"> {{ @$data->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label">Current Status</label>
                                                <div
                                                    class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" name="status"
                                                        @if ($data->status) checked @endif
                                                        class="custom-control-input" id="customSwitch3" value="1">
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
    $img = 'data:image/png;base64,' . $fileDecrypt;
@endphp
@include('common.file-upload', compact('img'))


@push('child-scripts')
    <script>
        $('#datepicker').datepicker({
            format: 'mm-dd-YYYY',
            starDate: "+0d"
        });

        $('#add_by_law').validate({
            rules: {
                name: {
                    maxlength: 50,
                    required: true
                },

                description: {
                    required: true
                },
                image: {
                    required: false,
                    accept: "image/jpg,image/jpeg,image/png",
                },


            },
            messages: {


                name: {
                    required: "Please enter a title."
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
