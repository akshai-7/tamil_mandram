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
                        <li class="breadcrumb-item"><a  href="{{url('s_category')}}">Sponsors category</a></li>
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
                            <button  type="button" class="btn btn-primary pull-right d-none " data-toggle="modal" data-target="#modal-lg"> + Add Category</button>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width: 42.934px;">S.No</th>
                                        <th>Category name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Platinum </td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" title="Edit" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Gold</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Sliver</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
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
                                        <label>Language</label>
                                        <input type="text" name="language" id="language" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-12">
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
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
                                        <label>Category</label>
                                        <input type="text" name="language" value="Platinum" id="language" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label">Current status</label>
                                        <div class="custom-control lg-btn  custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input  checked type="checkbox" checked class="custom-control-input" id="customSwitch3">
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
