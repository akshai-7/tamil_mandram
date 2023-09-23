@extends('app')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item "><a href="{{ route('user') }} " >Users </a></li>
                        <li class="breadcrumb-item active hover1"><a href="#">List </a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card collapsed-card search-card">
                        <div class="card-header">
                            <div class="card-title"><h4>Search Report</h4></div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-primary" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: none;">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            @if(Auth::user()->super_admin)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Organization Name</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select Organization</option>
                                                        <option value="1"> T&S Construction </option>
                                                        <option value="1">The Tree Fellas</option>
                                                        <option value="1">Ruggiero Brothers</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Nationality </label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Selected Nationality </option>
                                                        <option selected value="1"> Albanian </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Country</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select Course</option>
                                                        <option selected value="1"> Albania </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> State</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select State</option>
                                                        <option value="1">Medina</option>
                                                        <option value="2">Jeddah</option>
                                                        <option value="3">All Hofuf </option>
                                                        <option value="4">Riyadh</option>
                                                        <option value="5">Yemen</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> City</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select City</option>
                                                        <option value="1">Khaybar</option>
                                                        <option value="2">AL-HAMARA'A</option>
                                                        <option value="3">Juatha</option>
                                                        <option value="4">Al Khitah</option>
                                                        <option value="5">Az Zabirah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Pin Code</label>
                                                    <input class="form-control" name="pine" value="" placeholder="Pin code">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group" style="margin-top: 31px;">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style=" padding:0px;">
                            <div class="card-title"></div>
                            @if(!Auth::user()->super_admin)
                            <a class="btn btn-primary pull-right"  href="{{url('users_form')}}" class="hover"> + Add Users</a>
                            <a class="btn btn-primary pull-right mr-2" data-toggle="modal" data-target="#user_upload" > <i class="fa fa-upload" style="color: white;" aria-hidden="true"></i> User Profile upload</a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>Email Id</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Created Date Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>USE-001</td>
                                        <td>Abdul Alim</td>
                                        <td>7564557691</td>
                                        <td>Abdul@gmail.com</td>
                                        <td>Medina</td>
                                        <td>Khaybar</td>
                                        <td>11/22/2022 1:33:01 AM</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            @if(!Auth::user()->super_admin)
                                            <a title ="edit"style="color:#02468F" href="{{url('Edit_users_form')}}"> <i class="fa fa-edit"></i></a>
                                            <a title ="remove" style="color:red" href="{{url('Edit_users_form')}}"> <i class="fa fa-trash "></i></a>
                                            @else
                                            <a style="color:#02468F" href="{{url('Edit_users_form')}}"> <i class="fa fa-eye"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>USE-002</td>
                                        <td>Dawoud</td>
                                        <td>6576869586</td>
                                        <td>Dawoud@gmail.com</td>
                                        <td>Jeddah</td>
                                        <td>AL-HAMARA'A</td>
                                        <td>31/22/2022 1:01:47 AM</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            @if(!Auth::user()->super_admin)
                                            <a  title ="edit" style="color:#02468F" href="{{url('Edit_users_form')}}"> <i class="fa fa-edit"></i></a>
                                            <a title ="remove" style="color:red" href="{{url('Edit_users_form')}}"> <i class="fa fa-trash "></i></a>
                                            @else
                                            <a  title ="edit" style="color:#02468F" href="{{url('Edit_users_form')}}"> <i class="fa fa-eye"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>USE-003</td>
                                        <td>Shakir</td>
                                        <td>7689354676</td>
                                        <td>Shakir@gmail.com</td>
                                        <td>All Hofuf</td>
                                        <td>Juatha</td>
                                        <td>31/22/2022 1:01:47 AM</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            @if(!Auth::user()->super_admin)
                                            <a  title ="edit"style="color:#02468F" href="{{url('Edit_users_form')}}"> <i class="fa fa-edit"></i></a>
                                            <a  title ="remove" class="del-user" style="color:red" href="#"> <i class="fa fa-trash "></i></a>
                                            @else
                                            <a  title ="edit" style="color:#02468F" href="{{url('Edit_users_form')}}"> <i class="fa fa-eye"></i></a>
                                            @endif
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
    <!-- /.content -->
</div>

<div class="modal fade" id="user_upload">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User upload</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tex-cneter">

                <div class="row col-12">
                    <div class="col-6">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" accept=".csv" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    @endsection
