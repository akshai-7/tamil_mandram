@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 ml-1">
                    <ol class="breadcrumb float-sm-left  ml-4">
                        <li class="breadcrumb-item"><a href="{{url('user')}}" class="hover1">Users</a></li>
                        <li class="breadcrumb-item active">Edit User</a></li>
                    </ol>
                    <div class="btn btn-primary back-btn pull-right mr-4"><a href="{{url('user')}}" class="hover">Back</a></button>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card ">
                            <!-- <div class="card-header card-custom-header">
                                <div class="card-title">User Registration Edit Form</div>
                            </div> -->

                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1" aria-selected="true">1. Basic Details</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3" aria-selected="false">2. Reset Password</a>
                                        </li>

                                    </ul>
                                </div>



                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-1" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="card-body">
                                            <form id="quickForm">
                                                <div class="row" style="padding: 15px;">


                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">First Name</label>
                                                            <input type="text" name="first_name" class="form-control" id="first_name" value="Abdul" placeholder="Enter First Name">

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Last Name</label>
                                                            <input type="text" name="last_name" value="Alim" class="form-control" id="last_name" placeholder="Enter Last Name">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email ID</label>
                                                            <input type="email" name="email" value="Abdul@gmail.com	" class="form-control" id="email" placeholder="@gmail.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="label">Phone Number</label>
                                                        <div class="input-group mb-3">

                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">+971</span>
                                                            </div>
                                                            <input type="text" value="7564557691" class="form-control" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Date of Birth</label>
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="text" class="form-control" value="11-22-1998" id="date" />
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text bg-light d-block">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Organization</label>
                                                            <select class="form-control" name="gender" id="gender" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                <option>Select Organization</option>
                                                                <option value="1"> T&S Construction</option>
                                                                <option selected="selected" value="2"> Ruggiero Brothers</option>
                                                                <option value="2"> The Tree Fellas</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Password</label>
                                                            <input type="password" name="password" value="123456" class="form-control" id="password" placeholder="*****">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Confirm Password</label>
                                                            <input type="password" name="conform_password" value="123456" class="form-control" id="conform_password" placeholder="*****">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Designation</label>
                                                            <input type="text" name="Designation" class="form-control" id="conform_password" placeholder="Enter Designation">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Emirates ID</label>
                                                            <input type="text" name="Emirates" value="1" class="form-control" id="conform_password" placeholder="Enter Emirates ID">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">User ID</label>
                                                            <input type="text" name="Emirates" value="001" class="form-control" id="conform_password" placeholder="Enter User Id">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">User Photo</label>
                                                            <div class="input-group">
                                                                <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="cropped" src="{{asset('/public/assets/dist/img/avatar5.png')}}" style="width: 100px;height:80px;padding-top: 28px;" src="" alt="">
                                                    </div>



                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Gender</label>
                                                            <select class="form-control" name="gender" id="gender" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                <option>Select Gender</option>
                                                                <option selected="selected" value="1">Male </option>
                                                                <option value="0">Female</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nationality</label>
                                                            <select class="form-control" name="nationality" id="nationality" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                <option>Select Nationality</option>
                                                                <option selected value="1"> Albanian </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Country</label>
                                                            <select class="form-control" name="country" id="country" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                <option selected="selected">Select Country</option>
                                                                <option selected value="1"> Albania </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">State</label>
                                                            <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                <option>Select State</option>
                                                                <option selected="selected" value="1">Medina</option>
                                                                <option value="2">Jeddah</option>
                                                                <option value="3">All Hofuf </option>
                                                                <option value="4">Riyadh</option>
                                                                <option value="5">Yemen</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">City</label>
                                                            <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                                <option>Select City</option>
                                                                <option selected="selected" value="1">Khaybar</option>
                                                                <option value="2">AL-HAMARA'A</option>
                                                                <option value="3">Juatha</option>
                                                                <option value="4">Al Khitah</option>
                                                                <option value="5">Az Zabirah</option>

                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Pincode</label>
                                                            <input type="text" name="Pincode" value="123432" class="form-control" id="exampleInputEmail1" placeholder="Enter Pincode 6 Digit">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Address</label>
                                                            <textarea class="form-control" rows="3" placeholder="Enter Address">Saudi arabia ,Medina ,Khaybar</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="label">Current status</label>
                                                            <div class="custom-control  custom-switch lg-btn custom-switch-off-danger custom-switch-on-success">
                                                                <input type="checkbox" checked class="custom-control-input" id="customSwitch3" checked>
                                                                <label class="custom-control-label" for="customSwitch3"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-5">
                                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                                    </div>

                                                </div>

                                                <!-- /.card-body -->

                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade " id="custom-tabs-one-3" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <form id="edit" action="#" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate" style="display: block;">
                                            <input type="hidden" name="_token" value="BUwSSncI04WwDEwhbDJzx3h8RJUUuVMhrwdhXl62">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" style=" color: #787878;">Password</label>
                                                        <input type="password" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Enter Password">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" style=" color: #787878;">Confirm Password</label>
                                                        <input type="password" name="learning_path_title" class="form-control" id="myInput" placeholder="Enter Confirm Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <button type="submit" value="" class="btn btn-primary mt-4 " style="margin-top: 31px !important;">Reset Password</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
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
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
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
