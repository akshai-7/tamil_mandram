@extends('app')
@section('content')

<style>
    .card-header:first-child  {
        padding: 0 !important;
    }
    .card-title {
       padding: 7px;
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
                        <li class="breadcrumb-item"><a  href="{{url('organisation')}}">Organization</a></li>
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
                    <div class="card">

                        <!-- /.card-header -->
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header "style="background-color: #fff;">
                            <div class="card-title" ></div>
                            <a href="{{url('Organisationadd')}}" class="btn btn-primary pull-right"> + Add organization</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Org. Name</th>
                                        <th>Org. Code</th>
                                        <th>Email id</th>
                                        <th>Mobile</th>

                                        <th>Renewal due</th>
                                        <th>Created date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tamil Community</td>
                                        <th>TAM0001</th>
                                        <td>tamil@gmail.com</td>
                                        <td> 9500371129 </td>
                                        <th>5 Days</th>
                                        <td>10-01-2022 </td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a title="Edit" href="{{url('OrganisationEdit')}}"> <i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Telugu  Community</td>
                                        <th>TEL0002</th>
                                        <td>Telugu@gmail.com</td>
                                        <td> 7418263838 </td>
                                        <th>16 Days</th>
                                        <td>10-05-2022</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a title="Edit" href="{{url('OrganisationEdit')}}"> <i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Malayalam  Community</td>
                                        <th>MAL0003</th>
                                        <td>malayalam@gmail.com</td>
                                        <td> 84241575241 </td>
                                        <th>10 Days</th>
                                        <td>5-05-2022</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a title="Edit" href="{{url('OrganisationEdit')}}"> <i class="fa fa-edit"></i></a>
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
