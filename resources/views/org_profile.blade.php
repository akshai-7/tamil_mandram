@extends('app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Cropper CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
<!-- Cropper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .btn:not(:disabled):not(.disabled) {
        background-color: #02468F;
    }

    a {
        text-decoration: none;
        /* background-color: #ae949400;
color: white; */
    }

    a:hover {
        text-decoration: none;

    }

    /* .hover:hover{
  text-decoration: none;
color: white;
} */
    /* .hover{
  text-decoration: none;
color: white;
} */

    /*  */



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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('/public/assets/dist/img/user2-160x160.jpg')}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center" style="text-transform: capitalize;">{{ Auth::user()->u_name }}</h3>
                            <p class="text-center" style="color: #365fa9;">mgh@gmail.com</p>
                            <p class="text-center" style="color: #365fa9;">6579687346</p>

                            <!-- <p class="text-center">mgh@gmail.com</p> -->





                            <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email Id</b> <a class="float-right">1,322</a>
                  </li>

                  <li class="list-group-item">
                    <b>City</b> <a class="float-right">13,287</a>
                  </li>
                </ul> -->

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">1. Basic details</a>
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
                                    <form id="London" action="" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                        @csrf

                                        <div class="row">
                                            <!-- left column -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Organization name </label>
                                                    <input type="text" name="learning_path_title" value="Tamil Community" class="form-control" id="learning_path_title" placeholder="Enter First Name" va>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Organization code</label>
                                                    <input type="text" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Enter Last Name" value="TAM001" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email Id</label>
                                                    <input type="text" name="learning_path_title" value="tamil@gmail.com" class="form-control" id="learning_path_title" placeholder="Enter Email Id">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile"> Logo Image</label>
                                                    <div class="">
                                                        <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <img class="cropped" src="{{asset('/public/assets/dist/img/user2-160x160.jpg')}}" style="width: 100px;height:80px;padding-top: 28px;" src="" alt="">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="label">Phone Number</label>
                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+</span>
                                                    </div>
                                                    <input type="text" class="form-control" value="84241575241" placeholder="Phone number">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter Address">17, DD Street , New York , USA </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" value="" class="btn btn-primary pull-right">Submit</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade show " id="custom-tabs-password" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <form id="edit" action="{{ url('smart-labours/Addlearningpathtitle')}} " class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate" style="display: block;">
                                        <input type="hidden" name="_token" value="BUwSSncI04WwDEwhbDJzx3h8RJUUuVMhrwdhXl62">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" style=" color: #787878;">Password</label>
                                                    <input type="password" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Enter password">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" style=" color: #787878;">Confirm password</label>
                                                    <input type="password" name="learning_path_title" class="form-control" id="myInput" placeholder="Enter confirm password">
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <button type="submit" value="" class="btn btn-primary mt-4 " style="margin-top: 31px !important;">Reset Password</button>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b>Note :</b></p>
                                                <ul>
                                                    <li> Minimum 8 character length </li>
                                                    <li> Minimum 1 capitial letter </li>
                                                    <li> Minimum 1 speical character </li>
                                                    <li> Minimum 1 Number </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
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
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
</div>


<script>
    // on change show image with crop options // vars
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
