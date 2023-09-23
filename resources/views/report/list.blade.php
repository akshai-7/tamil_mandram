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
                        <li class="breadcrumb-item  "> <a  href="{{ route('report')}} ">Report</a></li>
                        <li class="breadcrumb-item active "> List</li>
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
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> User Name</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select User</option>
                                                        <option value="1">Faizel</option>
                                                        <option value="0">Siva</option>
                                                    </select>
                                                </div>
                                            </div>
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
                                                    <label> Category</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select Category</option>
                                                        <option value="1"> Introduction </option>
                                                        <option value="2"> General </option>
                                                        <option value="2"> Summary </option>
                                                    </select>
                                                </div>
                                            </div> -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Course</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select Course</option>
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
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label> Status</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select Status</option>
                                                        <option value="1">Improved </option>
                                                        <option value="0">Not Improved </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mt-4">
                                                    <label></label>
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
                        <div class="card-header">
                            <h3 class="card-title"><br></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Organization </th>
                                        <th>Course </th>
                                        <th style="width: 100.3633px;">Completion %</th>
                                        <th style="width: 64.3633px;">Pre Test</th>
                                        <th>Post Test</th>
                                        <th>Status </th>
                                        <th>Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>Faizel</td>
                                        <td>T&S Construction</td>
                                        <td>Scaffolding</td>
                                        <td>100</td>
                                        <td>5/10</td>
                                        <td>7/10</td>
                                        <td><label class="badge badge-success"> Improved </label></td>
                                        <td>
                                            <a download href="{{asset('public/assets/files/certificate.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/certificate.svg')}}"    data-toggle="tooltip"  class="svg-img"    title="Certificate"></a>
                                            <a download href="{{asset('public/assets/files/pre-test-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/PreTest.svg')}}"    data-toggle="tooltip"  class="svg-img"    title="Pre Test"></a>
                                            <a download href="{{asset('public/assets/files/post-tesst-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/PostTest.svg')}}"  data-toggle="tooltip" class="svg-img" title="Post Test"></a>
                                            <a download href="{{asset('public/assets/files/feedback-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/feedback.svg')}}"    data-toggle="tooltip"  class="svg-img"   title="Feedback"></a>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td>Abdul Awwal</td>
                                        <td>Ruggiero Brothers</td>
                                        <td>Structural Welding</td>
                                        <td>45 </td>
                                        <td>6/10</td>
                                        <td>8/10</td>
                                        <td><label class="badge badge-success "> Improved </label></td>
                                        <td><a download href="{{asset('public/assets/files/certificate.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/certificate.svg')}}"    data-toggle="tooltip"  class="svg-img"    title="Certificate"></a>
                                            <a download href="{{asset('public/assets/files/pre-test-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/PreTest.svg')}}"    data-toggle="tooltip"  class="svg-img"    title="Pre Test"></a>
                                            <a download href="{{asset('public/assets/files/post-tesst-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/PostTest.svg')}}"   data-toggle="tooltip" class="svg-img" title="Post Test"></a>
                                            <a download href="{{asset('public/assets/files/feedback-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/feedback.svg')}}"    data-toggle="tooltip"  class="svg-img"   title="Feedback"></a>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td>Shakir</td>
                                        <td>The Tree Fellas</td>
                                        <td>EID002</td>
                                        <td>100</td>
                                        <td>5/10</td>
                                        <td>4/10</td>
                                        <td><label class="badge badge-danger "> Not Improved </label></td>
                                        <td>
                                            <a download href="{{asset('public/assets/files/certificate.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/certificate.svg')}}"    class="svg-img"  data-toggle="tooltip"  title="Certificate"></a>
                                            <a download href="{{asset('public/assets/files/pre-test-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/PreTest.svg')}}"    class="svg-img"  data-toggle="tooltip"  title="Pre Test"></a>
                                            <a download href="{{asset('public/assets/files/post-tesst-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/PostTest.svg')}}" class="svg-img"  data-toggle="tooltip"  title="Post Test"></a>
                                            <a download href="{{asset('public/assets/files/feedback-report.pdf') }}" style="padding: 3px;"> <img  src=" {{asset('public/assets/dist/svg/feedback.svg')}}"   class="svg-img"  data-toggle="tooltip"  title="Feedback"></a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
