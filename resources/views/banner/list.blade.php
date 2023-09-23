@extends('app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 ">
                    <ol class="breadcrumb float-sm-left ">
                        <li class="breadcrumb-item"><a href="{{url('banner')}}" class="hover1">Banner</a></li>
                        <li class="breadcrumb-item active">List</a></li>
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


                <div class="card p-0">
                    <div class="card-header card-custom-header">
                        <div class="card-title">Banner upload</div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    @if(!@$data)
                        <form action="{{route('banner.store')}}" method="post" id="add_banner">
                            @csrf
                        @else
                        <form id="edit_event" id="add_banner" method="POST" action="{{ route('banner.update',encrypt($data->id)) }}" class="tabcontent" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @endif

                            <div class="row">
                                <div class="col-md-4 offset-md-1">

                                    <div class="form-group">
                                        <label for="exampleInputFile"> Photo upload</label>
                                        <div class="input-group">
                                            <input name="image" id="file-input" accept="image/*" class="" type="file" data-error="#errNm1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img class="cropped  preview-img  no-broder" data-toggle="modal" data-target="#getCroppedCanvasModal" @if(@$data) src="data:image/png;base64,{!! $fileDecrypt !!}" @else src="{{asset('/public/assets/dist/img/photo.png')}}" @endif alt="">
                                    <input type="hidden" name="image_src" value="" class="hidden-preview-img">
                                </div>

                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="label">Current status</label>
                                        <div class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" @if(@$data->status) checked @endif class="custom-control-input" id="customSwitch3" value="1" name="status">
                                            <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary col-md-4"> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card p-0">
                    <div class="card-header p-0">
                        <div class="card-title"></div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="bannerTable" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th style="width: 42.934px;">S.No</th>

                                    <th style="width: 350px;  text-align: center;">Banner image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


@php
$img = @$fileDecrypt ? $fileDecrypt : "";
@endphp

@include('common.file-upload',compact('img'))

@endsection

@push("child-scripts")
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'mm-dd-YYYY'
        });

        $('#add_banner').validate({
            rules: {
                image: {
                    required: true,
                    accept: "image/jpg,image/jpeg,image/png",
                }
            },
            messages: {


                image: {
                    required: "Please select banner image",
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
            submitHandler: function(form) {

                form.submit();
            }
        });
        var table = $('#bannerTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            dom: 'lBfrtip',
            autoWidth: true,
            orderable: false,
            // "order": [[ 7, 'desc' ]],
            buttons: [{
                extend: "excelHtml5",
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                title: 'Organizations'
            }],
            lengthMenu: [
                [
                    10, 25, 50, -1
                ],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ route('banner.index') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'path',
                    name: 'path'
                },
                {
                    data: 'status',
                    name: 'Status'
                },

                {
                    data: 'action',
                    name: 'action'
                },

            ]
        });
    });
</script>
@endpush
