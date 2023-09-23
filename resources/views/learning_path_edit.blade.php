@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{url('learningpathlist')}}" class="hover1">Learning Path</a></li>
                        <li class="breadcrumb-item active">Learning Path Detail</a></li>
                    </ol>
                    <a class="btn btn-primary  pull-right" href="{{ url('learningpathlist') }}">Back</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-header card-custom-header">
                            <div class="card-title">Edit Learning Path</div>
                        </div>
                        <div class="card-body">
                            <form id="London" action="{{ route('Addlearningpathtitle') }}" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Learning Path Title</label>
                                            <input type="text" value="Construction technology" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Learning Path Title">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea class="form-control" name="path_description" rows="3" placeholder="">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ml-2">
                                            <label>Current status</label>
                                            <div class="custom-control custom-switch  lg-btn custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                                <label class="custom-control-label lg-btn " for="customSwitch3"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" value="" class="btn btn-primary pull-right">Submit</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
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
<div class="modal " id="add_category" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Category</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                            <label>Course Category</label>
                            <input type="text" class="form-control" name="cateogry">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal " id="edit_category" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                            <label>Course Category</label>
                            <input type="text" class="form-control" name="cateogry" value="arabic">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    // vars
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
