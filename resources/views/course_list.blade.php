@extends('app')
@section('content')
<style>
</style>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item "> <a class="hover1" href="{{ route('courselist')}}">Course</a></li>
                        <li class="breadcrumb-item "> <a>List</a></li>
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
                            <form action="">
                                <div class="row">
                                    <div class="row col-12">
                                        @if(Auth::user()->super_admin)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Organization Name</label>
                                                <select class="form-control select2" name="user">
                                                    <option>Select Organization</option>
                                                    <option value="1"> T&S Construction</option>
                                                    <option value="2"> Ruggiero Brothers</option>
                                                    <option value="2"> The Tree Fellas</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Learning Path</label>
                                                <select class="form-control select2" name="user">
                                                    <option>Learning Path</option>
                                                    <option value="1"> Construction technology </option>
                                                    <option value="2"> Mechanical inspection</option>
                                                    <option value="2"> Building inspection</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Language</label>
                                                <select class="form-control select2" name="user">
                                                    <option>Select Language</option>
                                                    <option value="1"> Arabic </option>
                                                    <option value="2"> English</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Status</label>
                                                <select class="form-control select2" name="user">
                                                    <option>Select Status</option>
                                                    <option value="1">Active </option>
                                                    <option value="0">In Active </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mt-2 pull-right">
                                                <label></label>
                                                <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.card -->
                    <div class="card ">
                        <div class="card-header p-0">
                            <div class="card-title"></div>
                            <a class="btn btn-primary pull-right" href="{{url('courseadd')}}" class="hover"> + Add Course</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12">
                                <table id="example1" class="table table-bordered table-striped common-table ">
                                    <thead>
                                        <tr>
                                            <th style="    width: 1px;">S.No</th>
                                            <th>Learning Path</th>
                                            <th>Course Title</th>
                                            <th>Level</th>

                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Construction technology </td>
                                            <td>General Administration</td>
                                            <td>Level 1</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <a href="{{url('courseedit')}}" title="Edit"> <span class="fa fa-edit"></span></a>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Mechanical inspection </td>
                                            <td>Structural Welding</td>
                                            <td>Level 2</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <a href="{{url('courseedit')}}" title="Edit"> <span class="fa fa-edit"></span></a>


                                            </td>

                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Building inspection </td>
                                            <td>Plumbing</td>
                                            <td>Level 3</td>
                                            <td><span class="badge bg-danger">In-active</span></td>
                                            <td>
                                                <a href="{{url('courseedit')}}" title="Edit"> <span class="fa fa-edit"></span></a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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


@endsection
