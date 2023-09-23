@extends('app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .btn:not(:disabled):not(.disabled) {
        background-color: #02468F;
    }

    a {
        text-decoration: none;
        background-color: #ae949400;
        color: #272424;
    }

    .table.dataTable>thead>tr>th:not(.sorting_disabled),
    table.dataTable>thead>tr>td:not(.sorting_disabled) {
        background-color: #02468F;
        color: #F7F9FD;
    }

    .hover:hover {
        text-decoration: none;
        color: white;
    }

    .hover {
        text-decoration: none;
        color: white;
    }
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
                        <li class="breadcrumb-item active "> <a  href="{{ route('level')}} ">Level</li>
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
                    <div class="card">

                        <!-- /.card-header -->
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Level List</div>
                            <button type="button" style="float: right;" class="btn "><a href="{{url('addlevel')}}" class="hover">Add Level</a></button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Level Title</th>
                                        <th>Course Title</th>
                                        <th>Level Type</th>
                                        <th>Language</th>
                                        <th>CreatedBy</th>
                                        <th>Last  Modified</th>
                                        <th>Setting</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>	Feedback</td>
                                        <td>Test Home safety</td>

                                        <td>Feedback</td>
                                        <td>	Arabic,English</td>
                                        <td>	Rakta Admin</td>
                                        <td>24-12-2022 </td>
                                        <td><span class="badge bg-danger">In-active</span></td>

                                        <td>
                                            <a href="{{url('editlevel')}}"> <span style="color:green;" class="glyphicon glyphicon-pencil"></span></a>


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


@endsection
