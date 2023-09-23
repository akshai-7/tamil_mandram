@extends('app')
@section('content')
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .btn:not(:disabled):not(.disabled) {
        background-color: #02468F;
    }

    a {
        text-decoration: none;
        background-color: #ae949400;
        color: white;
    }

    .hover:hover {
        text-decoration: none;
        color: white;
    }

    .hover1:hover {
        text-decoration: none;
        color: gray;
    }

    .hover {
        text-decoration: none;
        color: white;
    }

    .hover1 {
        text-decoration: none;
        color: gray;
    }

    .tab {
        overflow: hidden;
    }

    /* Style the buttons inside the tab */
    .tab button {
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    button,
    input[type="submit"],
    input[type="reset"] {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }

    body {
        font-family: "Lato", sans-serif;
    }

    ul.tab {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    /* Float the list items side by side */
    ul.tab li {
        float: left;
    }

    /* Style the links inside the list items */
    ul.tab li a {
        display: inline-block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of links on hover */

    /* Change background color of buttons on hover */


    /* Create an active/current tablink class */


    /* Style the tab content */
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{url('organisation')}}" class="hover1">Organization Name</a></li>
                        <li class="breadcrumb-item active">Admin</a></li>
                        <li class="breadcrumb-item active">Add New Admin</a></li>
                    </ol>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <ul class="tab">

                                <h3 class="card-title"></h3>
                                <h3 class="card-title"></h3>

                                <li><a href="#" class="tablinks" onclick="openCity(event, 'London')">Admin Profile</a></li>
                                <li><a href="#" class="tablinks" onclick="openCity(event, 'Paris')">Admin Settings</a></li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->




                        <body>




                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                            <div class="card-body">
                                <form id="Paris" action="{{route('Addlearningpathtitle')}}" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Smart Worker strength</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Supporter strength</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Admin/Sub Admin strength</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Smart Worker strength</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group" style="border:1px solid ">

                                                </div>
                                            </div>
                                        </div>





                                    </div>

                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Smart Labour Course</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <p> You can select the course later in the next step</p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No Of Assessment Attempts</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Health & Safety</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Innovative Ideas</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Feedback</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="number" name="learning_path_title" class="form-control" id="learning_path_title">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-2">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">User Password Field</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected"></option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <!-- <input type="number" name="learning_path_title" class="form-control" id="learning_path_title"> -->
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div >
                                        <button type="submit " value="" class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div>

                                <form id="London" action="{{route('Addlearningpathtitle')}}" class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                    @csrf

                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                <a class="handpic"  href="{{url('organisationAdmin')}}" ><img src="{{asset('/public/assets/dist/img/admin.png')}}" /></a>
                                                    <input type="text" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Organization Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Current status</label>
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected">Select Current status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.card-body -->
                                    <div>
                                        <button type="submit" value="" class="btn btn-primary pull-right">Submit</button>
                                    </div>
                                </form>
                            </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        document.getElementsByClassName('tablinks')[0].click()

        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    @endsection
