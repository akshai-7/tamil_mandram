@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item "> <a href="{{ route('sponsors')}}" class="hover1"> Sponsors</li>
                        <li class="breadcrumb-item active "> &nbsp; / <a> Add sponsor </a></li>
                    </ol>
                    <a class="btn btn-primary  pull-right" href="{{ url('sponsors') }}">Back</a>
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
                            <div class="card-title"> Add sponsor </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm">
                            <div class="row" style="padding: 15px;">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Sponsor category</label>
                                        <select class="form-control">
                                            <option>Select category</option>
                                            <option>Platinum</option>
                                            <option>Gold</option>
                                            <option>Sliver</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image upload</label>
                                        <div class="input-group">
                                            <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img class="cropped" src="{{asset('/public/assets/dist/img/photo.png')}}" style="width: 100px;height:80px;padding-top: 28px;" src="" alt="">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control summernote"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label">Current status</label>
                                        <div class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" checked class="custom-control-input" id="customSwitch3">
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

            <main class="page">

                <div class="box">

                </div>
                <!-- leftbox -->

                <!--rightbox-->

                <!-- input file -->
                <div class="box">

                    <!-- save btn -->
                    <div class=" save hide">
                        <div>
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Photo upload</h4>
                                            <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-2 img-result hide">
                                                <!-- result of crop -->
                                            </div>
                                            <div class="box-2">
                                                <div class="result"></div>
                                            </div>
                                            <!-- input file -->
                                            <div class="box">
                                                <div class="options hide">
                                                    <!-- <label> Width</label> -->
                                                    <input type="hidden" class="img-w" value="300" min="300" max="300" />
                                                </div>
                                                <!-- save btn -->

                                                <!-- download btn -->
                                                <!-- <button class="btn download hide">Download</button> -->

                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"> upload</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                    <!-- download btn -->

                </div>
            </main>
        </div>
    </section>
    <!-- /.content -->
</div>
<script>
    $('#datepicker').datepicker({
        format: 'mm-dd-YYYY'
    });


    let result = document.querySelector('.result'),
        img_result = document.querySelector('.img-result'),
        img_w = document.querySelector('.img-w'),
        img_h = document.querySelector('.img-h'),
        options = document.querySelector('.options'),
        save = document.querySelector('.save'),
        cropped = document.querySelector('.cropped'),
        dwn = document.querySelector('.download'),
        upload = document.querySelector('#file-input'),
        cropper = '';

    // on change show image with crop options
    upload.addEventListener('change', e => {
        if (e.target.files.length) {
            // start file reader
            const reader = new FileReader();
            reader.onload = e => {
                if (e.target.result) {
                    // create new image
                    let img = document.createElement('img');
                    img.id = 'image';
                    img.src = e.target.result;
                    // clean result before
                    result.innerHTML = '';
                    // append new image
                    result.appendChild(img);
                    // show save btn and options

                    if (save && options) {
                        save.classList.remove('hide');
                        options.classList.remove('hide');
                    }


                    // init cropper
                    cropper = new Cropper(img);
                }
            };
            reader.readAsDataURL(e.target.files[0]);


        }
    });

    // save on click
    save.addEventListener('click', e => {
        e.preventDefault();
        // get result to data uri
        let imgSrc = cropper.getCroppedCanvas({
            width: img_w.value // input value
        }).toDataURL();
        // remove hide class of img
        cropped.classList.remove('hide');
        img_result.classList.remove('hide');
        // show image cropped
        cropped.src = imgSrc;
        if (dwn) {
            dwn.download = 'imagename.png';
            dwn.setAttribute('href', imgSrc);
            $("#modal-lg").modal("toggle");
            $(".modal-backdrop").hide();
        }

        $("#modal-lg").modal("toggle");
        $(".modal-backdrop").hide();
    });
</script>

@endsection
