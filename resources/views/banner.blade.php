@extends('app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 ">
                    <ol class="breadcrumb float-sm-left ">
                        <li class="breadcrumb-item"><a href="{{url('sponsors')}}" class="hover1">Sponsors</a></li>
                        <li class="breadcrumb-item active">List</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card p-0">
                    <div class="card-header p-0">
                        <div class="card-title"></div>
                        <a class="btn btn-primary pull-right" href="{{url('sponsor_add')}}" class="hover"> + Add sponsors</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th style="width: 42.934px;">S.No</th>
                                    <th> Sponsor category</th>
                                    <th style="width: 350px;  text-align: center;">Sponsors image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Platinum</td>
                                    <td style=" text-align: center;"><img src="{{asset('/public/assets/dist/img/pexels.jpg')}}" width="100px" class="img elevation-2" alt="User Image"></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <a href="{{url('sponsor_edit')}}" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                        <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Gold</td>
                                    <td style=" text-align: center;"><img src="{{asset('/public/assets/dist/img/download.jpg')}}" width="100px" class="img elevation-2" alt="User Image"></td>
                                    <td><span class="badge bg-danger">In-active</span></td>
                                    <td>
                                        <a href="{{url('sponsor_edit')}}" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                        <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Sliver</td>
                                    <td style=" text-align: center;"><img src="{{asset('/public/assets/dist/img/downloads.jpg')}}" width="100px" class="img elevation-2" alt="User Image"></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <a href="{{url('sponsor_edit')}}" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                        <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
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
