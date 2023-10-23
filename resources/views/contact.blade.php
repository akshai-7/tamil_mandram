@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('contact') }}" class="hover1">Contact Us</a></li>
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
                                <div class="card-title"> Contact Details </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('contact-save') }}" method="post" id="contact_save">
                                @csrf
                                <input hidden name="id" value="{{ @$data->id }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control summernote" name="contact_description" id="contact_description"></textarea>
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
    <script>
        $('#contact_save').validate({
            rules: {

                contact_description: {
                    required: true
                },

            },
            messages: {
                contact_description: {
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
            //     if ($('#contact_description').summernote('isEmpty')) { //using id
            //         console.log("sdf");
            //         alert('Description is empty');
            //     } else {
            //         form.submit();
            //     }
            // }
        });
    </script>
@endpush
