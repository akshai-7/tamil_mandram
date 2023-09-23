@extends('app')
@section('content')
<style>
    .page {
        margin: 1em auto;
        max-width: 768px;
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        height: 100%;
    }

    .box {
        padding: 0.5em;
        width: 100%;
        margin: 0.5em;
    }

    .box-2 {
        padding: 0.5em;
        width: calc(100%/2 - 1em);
    }

    .options label,
    .options input {
        width: 4em;
        padding: 0.5em 1em;
    }



    .hide {
        display: none;
    }

    img {
        max-width: 100%;
    }


    .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .form-input {
        width: 350px;
        padding: 20px;
        background: #fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
            3px 3px 7px rgba(94, 104, 121, 0.377);
    }

    .form-input input {
        display: none;

    }


    .form-input img {
        width: 100%;
        display: none;

        margin-bottom: 30px;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{url('organisation')}}" class="hover1">Organization List</a></li>
                        <li class="breadcrumb-item active">Organization</a></li>
                    </ol>
                    <a class="btn btn-primary  pull-right" href="{{ url('organisation') }}">Back</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header card-custom-header">
                            <div class="card-title">Add Organization </div>
                        </div>
                        <div class="card-body">
                            <form id="London" action="{{route('Addlearningpathtitle')}}" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Organization name</label>
                                            <input type="text" name="learning_path_title" class="form-control" id="org_name" placeholder="Organization name" value="New York Tamil Mandram">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Organization code</label>
                                            <input type="text" name="learning_path_title" class="form-control" id="org_code" placeholder="Organization code" readOnly value="NEW001">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Subscription</label>
                                            <select class="form-control">
                                                <option selected> Monthly</option>
                                                <option> Annually</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email ID</label>
                                            <input type="email" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Email ID" value="tamil@gmail.com">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label">Phone number</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+1</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Phone Number" value="84241575241">
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Logo upload</label>
                                            <div class="input-group">
                                                <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img class="cropped" src="{{asset('/public/assets/dist/img/photo.png')}}" style="width: 100px;height:80px;padding-top: 28px;" src="" alt="">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea class="form-control"> 14,NH Road, New York, USA</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 ">
                                        <label>Current status</label>
                                        <div class="form-group">
                                            <div class="custom-control lg-btn custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" checked class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div>
                                    <button type="submit" value="" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <h4 class="modal-title">Image upload</h4>
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
                                    <button type="button" class="btn btn-primary"> Upload</button>
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
    <script>
        $(document).ready(function() {

            $(document).on("keyup", "#org_name", function() {
                var org_name = $(this).val().toUpperCase();

                if (org_name) {
                    org_name = org_name.substr(0, 3);
                    console.log(org_name.length);
                    if (org_name.length >= 3) {
                        $("#org_code").val(org_name+"0001");
                    } else{
                        $("#org_code").val("");
                    }
                }
            });
        });
        // vars
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
    <!-- /.content -->
    @endsection
