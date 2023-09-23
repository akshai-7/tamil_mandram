@extends('app')
@section('content')

<div class="content-wrapper">
    @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{url('learningpathlist')}}" class="hover1">Learning Path</a></li>
                        <li class="breadcrumb-item active"><a>Learning List</a></li>
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
                    @if(Auth::user()->super_admin)
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
                                    <div class=" row col-12">
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

                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Category </label>
                                                <select class="form-control select2" name="user">
                                                    <option> Select Category</option>
                                                    <option value="1"> Introduction </option>
                                                    <option value="2"> General </option>
                                                    <option value="2"> Summary </option>
                                                </select>
                                            </div>
                                        </div> -->


                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Course</label>
                                                <select class="form-control select2" name="user">
                                                    <option>Select Course</option>
                                                    <option value="1"> Scaffolding</option>
                                                    <option value="2"> Structural Welding</option>
                                                    <option value="2"> Pipe Welding </option>
                                                    <option value="1"> General Administration</option>
                                                    <option value="2"> Inspecting heating</option>
                                                    <option value="2"> ventilation systems </option>
                                                    <option value="1"> Plumbing</option>
                                                    <option value="2"> Electrical Wiring</option>
                                                    <option value="2"> Construction</option>
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
                                        </div> -->
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
                                        <div class="col-md-3 mt-4">
                                            <div class="form-group">
                                                <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!-- /.card -->
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title"></div>
                            <a class="btn btn-primary pull-right" href="{{url('learningpathadd    ')}}" class="hover"> + Add Learning Path</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 31.543px;">S.No</th>
                                        <th>Learning Path Title</th>
                                        <!-- <th>Image</th> -->
                                        <!-- <th>Description</th> -->
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
                                        <td>Construction technology</td>
                                        <!-- <td>This year, the overwhelming figures seem to turn this discipline, of which all the great leaders of construction have been speaking of for a while now, into a trend that will redefine construction as we now it today.</td> -->
                                        <td>{{ Auth::user()->u_name}}</td>
                                        <td>31-02-2022 1:01:00 AM</td>
                                        <td>11-03-2022 1:05:00 AM</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a href="{{ route('learningpathedit') }}" title="Edit"> <i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mechanical inspection</td>
                                        <!-- <td>The purpose of the mechanical inspection is to visually inspect and operate the built-in mechanical equipment observed on site and provide an opinion of any deficiencies apparent at the time of the inspection</td> -->
                                        <td>{{ Auth::user()->u_name}}</td>
                                        <td>01-03-2022 1:55:00 AM</td>
                                        <td>02-04-2022 1:35:00 AM</td>
                                        <td><span class="badge bg-danger">In-active</span></td>
                                        <td>
                                            <a href="{{ route('learningpathedit') }}" title="Edit"> <i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Building inspection</td>
                                        <!-- <td>A building inspection is an assessment and documentation of the condition of the property and building defects by the licensed building inspector. A building inspection involves the visual inspection of all the accessible parts of the property</td> -->
                                        <td>{{ Auth::user()->u_name}}</td>
                                        <td>22-03-2022 1:01:00 AM</td>
                                        <td>25-05-2022 1:01:00 AM</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a href="{{ route('learningpathedit') }}" title="Edit"> <i class="fa fa-edit"></i></a>
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
