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
                            <li class="breadcrumb-item active"><a data-original-title="" title=""> / Edit</a></li>
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
                                <div class="card-title"> Edit Executive Committee</div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="add_e_event" method="POST"
                                action="{{ route('executive-committee.update', encrypt($data->id)) }}" class="tabcontent"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ @$data->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Designation</label>
                                                <input type="text" name="designation" id="designation"
                                                    class="form-control" value="{{ @$data->designation }}">
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
                                            <img class="cropped lg preview-img no-broder" data-toggle="modal"
                                                data-target="#getCroppedCanvasModal"
                                                src="data:image/png;base64,{!! $fileDecrypt !!}" alt="" />
                                            <input type="hidden" name="image_src" value=""
                                                class="hidden-preview-img">
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control summernote" id="description">{{ @$data->description }} </textarea>
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
                    required: false,
                    accept: "image/jpg,image/jpeg,image/png",
                },


            },
            messages: {

                event_title: {
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

                description: {
                    required: "Please enter a description."
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
            //     if ($('#history_description').summernote('isEmpty')) { //using id
            //         console.log("sdf");
            //         alert('Description is empty');
            //     } else {
            //         form.submit();
            //     }
            // }
        });
    </script>
@endpush
