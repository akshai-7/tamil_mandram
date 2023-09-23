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
                        <li class="breadcrumb-item"><a href="{{url('event')}}">Manage About us</a></li>
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
                            <a href="{{route('manage_about_us_add')}}" class="btn btn-primary pull-right " > + Add </a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width: 42.934px;">S.No</th>
                                        <th>Type</th>
                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Executive Committee </td>
                                        <td>Sathis </td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a  href="{{route('manage_about_us_edit')}}"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>By-Laws  </td>
                                        <td>kumar </td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a  href="{{route('manage_about_us_edit')}}"> <i class="fa fa-edit" style="color:green"></i></a>
                                            <a title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>History </td>
                                        <td>kumar </td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a href="{{route('manage_about_us_edit')}}" > <i class="fa fa-edit" style="color:green"></i></a>
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


</div>
@endsection

@push("child-scripts")



@endpush
