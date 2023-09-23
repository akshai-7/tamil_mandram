@extends('app')
@section('content')


<link rel="stylesheet" media="screen" type="text/css" href="{{asset('/public/assets/build/css/colorpicker.css')}}" />

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item "> <a href="{{ route('organisation_setting')}}" class="hover1">Organisation Setting</li>
                        <li class="breadcrumb-item active "> &nbsp; / <a> Add Setting </a></li>
                    </ol>
                    <a class="btn btn-primary  pull-right" href="{{ url('organisation_setting') }}">Back</a>
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
                            <div class="card-title"> Edit Setting </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="row">

                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Organization Name</label>
                                            <select class="form-control select2" name="user">
                                                <option>Select Organization</option>
                                                <option  selected value="1"> Tamil Mandram </option>
                                                <option value="1"> Telugu Mandram</option>
                                                <option value="1"> Malayalam Mandram</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Primary Color</label>
                                            <input type="text" name="language" id="colorpickerField1" class="form-control color-picker" value="e0b6e0">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Secondary Color</label>
                                            <input type="text" name="language" id="colorpickerField2" class="form-control  color-picker" value="8a1c8a">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Third Color</label>
                                            <input type="text" name="language" id="colorpickerField3" class="form-control color-picker" value="ad84ad">
                                        </div>
                                    </div>


                                    <div class="col-md-12 text-center mt-3">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary col-md-3">
                                        </div>
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


<script src="{{asset('/public/assets/build/js/colorpicker.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
                onSubmit: function(hsb, hex, rgb, el) {
                    $(el).val(hex);
                    $(el).ColorPickerHide();
                },
                onBeforeShow: function() {
                    $(this).ColorPickerSetColor(this.value);
                }
            })
            .bind('keyup', function() {
                $(this).ColorPickerSetColor(this.value);
            });

    });
</script>

@endpush
