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
                        <li class="breadcrumb-item"><a href="{{url('Language')}}">Native language</a></li>
                        <li class="breadcrumb-item active"><a> List</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header " style="padding: 0;background-color: #fff;">
                            <div class="card-title "></div>
                            <button type="button" class="btn btn-primary pull-right " data-toggle="modal" data-target="#modal-lg"> + Add native language</button>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width: 42.934px;">S.No</th>
                                        <th>Menu name</th>
                                        <th>Native name</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Event</td>

                                        <td>நிகழ்வு</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" title="Edit" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Abouts US</td>

                                        <td>எங்களை பற்றி</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" title="Edit" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>3</td>
                                        <td>Sponsors</td>

                                        <td>ஸ்பான்சர்கள்</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" title="Edit" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <div class="modal fade " id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" width=900>
        <div class="modal-dialog modla-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add native language</h5>
                    <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Menu name</label>
                                        <select class="form-control">
                                            <option> Event</option>
                                            <option> Abouts US</option>
                                            <option> Sponsors</option>
                                            <option> Contant Us</option>
                                            <option> Upcoming Event</option>
                                            <option> pas Event</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Native name</label>
                                        <input type="text" class="form-control">
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
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade " id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" width=900>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit native language</h5>
                    <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Menu name</label>
                                        <select class="form-control">
                                            <option selected> Event</option>
                                            <option> Abouts US</option>
                                            <option> Sponsors</option>
                                            <option> Contant Us</option>
                                            <option> Upcoming Event</option>
                                            <option> pas Event</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Native name</label>
                                        <input type="text" class="form-control" value="நிகழ்வு">
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
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push("child-scripts")



@endpush
