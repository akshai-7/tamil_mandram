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
                        <li class="breadcrumb-item"><a href="{{url('event')}}">Upcoming Event</a></li>
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
                            <button type="button" class="btn btn-primary pull-right " data-toggle="modal" data-target="#modal-lg"> + Add Event</button>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width: 42.934px;">S.No</th>
                                        <th>Event Title</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>15th year celebration </td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a data-toggle="modal" title="Edit" data-target="#modal-edit" title="Edit"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Organization  general meeting </td>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
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
                                        <label>Event Title</label>
                                        <input type="text" name="language" id="language" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Event Date</label>
                                        <input type="date" name="language" id="language" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Event Photo</label>
                                        <div class="input-group">
                                            <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control"> </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Link</label>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Language</h5>
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
                                        <label>Event Title</label>
                                        <input type="text" name="language" id="language" class="form-control" value="15th year celebration">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Event Date</label>
                                        <input type="date" name="language" id="language" class="form-control" value="25-01-2023">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Event Photo</label>
                                        <div class="input-group">
                                            <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control"> 	15th year celebration </textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Link</label>
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
</div>
@endsection

@push("child-scripts")



@endpush
