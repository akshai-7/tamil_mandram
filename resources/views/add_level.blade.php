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
                        <li class="breadcrumb-item"><a class="hover1" href="{{url('level')}}">Level</a></li>
                        <li class="breadcrumb-item active">New Level</li>
                    </ol>
                </div>
                <div class="col-sm-12">
                    <div style="float: right;"> </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">1. Level Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">2. Level Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-content-tab" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">3. Level Content</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="p-3">
                                        <form id=" London">
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Level Title</label>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Level title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Learning path</label>
                                                        <select class="form-control select2 ">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9"> Accident Training </option>
                                                            <option value="2: 3"> COVID-19 </option>
                                                            <option value="3: 4"> Customer Service </option>
                                                            <option value="4: 1"> People of Determination </option>
                                                            <option value="5: 5"> Road Safety </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Category</label>
                                                        <select class="form-control select2 ">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9"> Categorty 1</option>
                                                            <option value="2: 3"> Categorty 2 </option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Course</label>
                                                        <select class="form-control select2">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9"> Accident Training </option>
                                                            <option value="2: 3"> COVID-19 </option>
                                                            <option value="3: 4"> Customer Service </option>
                                                            <option value="4: 1"> People of Determination </option>
                                                            <option value="5: 5"> Road Safety </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Current status </label>
                                                        <select class="form-control ">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9">Active</option>
                                                            <option value="2: 3">In Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="p-3">
                                        <form id="Paris">
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Duration</label>
                                                        <input type="number" name="email" class="form-control" id="exampleInputEmail1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Content Language </label>
                                                        <select class="form-control select2 " multiple>
                                                            <option value="1: 9"> Arabic </option>
                                                            <option value="2: 3"> English</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>
                                                            Shuffle Questions </label>
                                                        <select class="form-control ">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9"> Yes </option>
                                                            <option value="2: 3"> No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Shuffle Choice </label>
                                                        <select class="form-control ">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9"> Yes </option>
                                                            <option value="2: 3"> No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> Is Mandatory </label>
                                                        <select class="form-control ">
                                                            <option value="">Please Select</option>
                                                            <option value="1: 9"> Yes </option>
                                                            <option value="2: 3"> No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="custom-tabs-one-content-tab" role="tabpanel" aria-labelledby="custom-tabs-one-content-tab">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
