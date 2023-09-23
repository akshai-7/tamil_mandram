@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item "> <a href="{{ route('whatapp')}}" class="hover1">whatsapp </a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include("common.alert-message")
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card ">
                        <div class="card-header card-custom-header">
                            <div class="card-title"> whatsapp details </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('whatapp-save')}}" id="whatapp_save" method="post">
                            @csrf
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Heading </label>
                                            <input class="form-control" type="text" value="{{@$data->whatapp_heading}}" name="whatapp_heading">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">whatsapp link</label>
                                            <input class="form-control" type="text" value="{{@$data->whatapp_url}}" name="whatapp_url">
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary pull-right col-md-4 ">Submit</button>
                                    </div>
                                </div>
                            </div>
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
@push("child-scripts")
<script>
    $(document).ready(function() {
        $('#whatapp_save').validate({
            rules: {
                whatapp_heading: {
                    required: true,
                    maxlength: 20
                },
                whatapp_url: {
                    required: true,
                    URL : true
                },
            },
            messages: {
                whatapp_heading: {
                    required: "Please enter heading."
                },
                whatapp_url: {
                    required:"Please enter url.",
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
