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
                        <li class="breadcrumb-item active">Add User</a></li>
                    </ol>
                    <div class="btn btn-primary back-btn pull-right mr-4">
                        <a href="{{url('user')}}" class="hover">Back</a>
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
                            <div class="card-header card-custom-header">
                                <div class="card-title">User Add</div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="row" style="padding: 15px;">


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name">

                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email ID</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label">Phone Number</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+971</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date of Birth</label>
                                            <div class="input-group date" id="datepicker">
                                                <input type="text" class="form-control" id="date" />
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
                                                <option selected="selected">Select Organization</option>
                                                <option value="1"> T&S Construction</option>
                                                <option value="2"> Ruggiero Brothers</option>
                                                <option value="2"> The Tree Fellas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="*****">

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Confirm Password</label>
                                            <input type="password" name="conform_password" class="form-control" id="conform_password" placeholder="*****">

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
                                            <input type="text" name="Emirates" class="form-control" id="conform_password" placeholder="Enter Emirates ID">

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">User ID</label>
                                            <input type="text" name="Emirates" class="form-control" id="conform_password" placeholder="Enter User ID">

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
                                        <img class="cropped" src="{{asset('/public/assets/dist/img/photo.png')}}" style="width: 100px;height:80px;padding-top: 28px;" src="" alt="">
                                    </div>



                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender" id="gender" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">Select Gender</option>
                                                <option value="1">Male </option>
                                                <option value="0">Female</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nationality</label>
                                            <select class="form-control" name="nationality" id="nationality" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">Select Nationality</option>
                                                <option selected value="1"> Albanian </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Country</label>
                                            <select class="form-control" name="country" id="country" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option selected value="1"> Albania  </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">State</label>
                                            <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">Select State</option>
                                                <option value="1">Medina</option>
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
                                                <option selected="selected">Select City</option>
                                                <option value="1">Khaybar</option>
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
                                            <input type="text" name="Pincode" class="form-control" id="exampleInputEmail1" placeholder="Enter Pincode 6 Digit">
                                        </div>

                                    </div>


                                    <!-- <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter Description"></textarea>
                                                </div>
                                            </div> -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="label">Current status</label>
                                            <div class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" checked class="custom-control-input" id="customSwitch3">
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
