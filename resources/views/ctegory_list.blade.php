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
                        <li class="breadcrumb-item active"> Category List</li>
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
                            <h3 class="card-title">Category List</h3>
                            <button type="button" style="float: right;" class="btn "><a href="{{url('ctegoryadd')}}" class="hover">Add Category </a></button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Category Title</th>
                                        <th>Learning Path Title</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Last Modified</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>testing25 </td>
                                        <td>testing012</td>

                                        <td>test</td>
                                        <td>Rakta Admin</td>
                                        <td>20-09-2022</td>
                                        <td>20-09-2022</td>
                                        <td><span class="badge bg-danger">In-active</span></td>
                                        <td>
                                            <a href="{{url('ctegoryedit')}}"> <span style="color:green;" class="glyphicon glyphicon-pencil"></span></a>


                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>testing012</td>
                                        <td>testing012</td>

                                        </td>

                                        <td>test</td>
                                        <td> Admin</td>
                                        <td>25-09-2022</td>
                                        <td>28-09-2022</td>
                                        <td><span class="badge bg-success">Active</span></td>

                                        <td>
                                            <a href="{{url('ctegoryedit')}}"> <span style="color:green;" class="glyphicon glyphicon-pencil"></span></a>


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
