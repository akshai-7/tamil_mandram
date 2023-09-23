@extends('app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Cropper CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
<!-- Cropper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>
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
                        <li class="breadcrumb-item active">Edit organisation</a></li>
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
                <!-- left column -->
                <div class="col-md-12">


                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">1. Organization Details</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">2. Settings</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-password" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">2. Reset password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body " style="background-color:#fff">
                            <div class="tab-content" id="custom-tabs-one-home1">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <form id="London" action="{{route('Addlearningpathtitle')}}" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <!-- left column -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Organization Name</label>
                                                    <input type="text" name="learning_path_title" class="form-control" id="org_name" placeholder="Organization Name" value="Tamil Mandram">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Organization Code</label>
                                                    <input type="text" name="learning_path_title" class="form-control" id="org_code" placeholder="Organization Code" readOnly value="TAM0001">
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
                                                    <input type="email" value="tamil@gmail.com" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Email ID">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="label">Phone Number</label>
                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+1</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Phone Number" value="950037119">
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
                                            <div class="col-md-6">
                                            <label for="exampleInputEmail1">Next renewal</label>
                                                <input type="date" class="form-control" placeholder="Phone Number" value="06-05-2023">
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <textarea class="form-control"> test address</textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label>Current status</label>
                                                    <div class="custom-control lg-btn custom-switch  custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" checked class="custom-control-input" id="customSwitch3" checked>
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




                                <div class="tab-pane fade show " id="custom-tabs-password" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                    <form id="edit" action="{{route('Addlearningpathtitle')}}" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <!-- left column -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="password" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Enter Password">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Confirm Password</label>
                                                    <input type="password" name="learning_path_title" class="form-control" id="myInput" placeholder="Enter Confirm Password">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button type="submit" style="position: relative;top: 23px;" value="" class="btn btn-primary pull-right">Reset Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>
</div>


<main class="page">

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
<!-- /.content -->
<script>
    $(document).ready(function() {

        $(document).on("keyup", "#org_name", function() {
            var org_name = $(this).val().toUpperCase();

            if (org_name) {
                org_name = org_name.substr(0, 3);
                console.log(org_name.length);
                if (org_name.length >= 3) {
                    $("#org_code").val(org_name + "0001");
                } else {
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

    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
    }

    document.getElementsByClassName('tablinks')[0].click()

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

@endsection
