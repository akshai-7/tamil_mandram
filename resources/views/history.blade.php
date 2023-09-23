@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('history') }}" class="hover1">History</a></li>
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
                                <div class="card-title"> History Details </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('history-save') }}" method="post" id="history_save">
                                @csrf
                                <input hidden name="id" value="{{ @$data->id }}">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo Upload</label>
                                                <div class="input-group">
                                                    <input name="image" id="file-input" accept="image/*" class=""
                                                        type="file" data-error="#errNm1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            @if ($fileDecrypt)
                                                <img class="cropped lg preview-img no-broder" data-toggle="modal"
                                                    data-target="#getCroppedCanvasModal"
                                                    src="data:image/png;base64,{!! @$fileDecrypt !!}" alt="" />
                                            @else
                                                <img class="cropped  preview-img  no-broder" data-toggle="modal"
                                                    data-target="#getCroppedCanvasModal"
                                                    src="{{ asset('/public/assets/dist/img/photo.png') }}" alt="">
                                            @endif
                                            <input type="hidden" name="image_src" value=""
                                                class="hidden-preview-img">
                                        </div>

                                        {{--
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="history_description" name="history_description" class="form-control summernote"> {{ @$data->history_description }}</textarea>
                                            </div>
                                        </div> --}}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="history_description" class="form-control summernote" id="history_description">{{ @$data->history_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label">Current Status</label>
                                                <div
                                                    class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox"
                                                        @if (@$data->status) checked @elseif(@$data && @$data->status == '0')   @else checked @endif
                                                        name="status" class="custom-control-input" id="customSwitch3"
                                                        value="1">
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
    $img = @$fileDecrypt ? 'data:image/png;base64,' . $fileDecrypt : '';
@endphp
@include('common.file-upload', compact('img'))


@push('child-scripts')
    @if (@$data)
        <script>
            $('#history_save').validate({
                rules: {
                    history_description: {
                        required: true
                    },
                },
                messages: {

                    event_title: {
                        required: "Please enter a name."
                    },

                    history_description: {
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
    @else
        <script>
            $('#history_save').validate({
                rules: {

                    history_description: {
                        required: true
                    },

                    image: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png",
                    }
                },
                messages: {

                    event_title: {
                        required: "Please enter a name."
                    },

                    history_description: {
                        required: "Please enter a description."
                    },

                    designation: {
                        required: "Please enter a designation."
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
    @endif
@endpush
