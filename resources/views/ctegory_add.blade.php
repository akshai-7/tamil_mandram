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
                <div class="col-sm-6">
                    <!-- <h1>Users Form</h1> -->



                </div>


                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a class="hover1" href="{{url('ctegorylist')}}">Category</a></li>
                        <li class="breadcrumb-item active">New Category</li>
                    </ol>
                </div>
                <div class="col-sm-12">
                    <div style="float: right;
">
                    </div>


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

                                <li><a href="#" class="tablinks" onclick="openCity(event, 'London')"> Category Detail</a></li>
                                <li><a href="#" class="tablinks" onclick="openCity(event, 'Paris')">Course List</a></li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->




                        <body>






                            <div id="Paris" class="tabcontent">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Course Title</th>
                                                <th> <button type="button" class="btn"><a href="{{url('user')}}" class="hover">Add Course </a></button>
                                                </th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td colspan="2">testing25 </td>
                                            </tr>


                                        </tbody>

                                    </table>
                                </div>
                            </div>










                            <div>

                                <form id="London" class="tabcontent">
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Category Title</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Learning Path
                                                    </label>
                                                    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                    <option value="">Please Select...</option>

                                                    <!----><option value="1: 9"> Accident Training </option>
                                                    <option value="2: 3"> COVID-19 </option>
                                                    <option value="3: 4"> Customer Service </option>
                                                    <option value="4: 1"> People of Determination </option>
                                                    <option value="5: 5"> Road Safety </option>


                                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-s4ie-container"><span class="select2-selection__rendered" id="select2-s4ie-container" role="textbox" aria-readonly="true" title="California"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description</label>
                                                    <textarea class="form-control" rows="3" placeholder=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Current status

                                                    </label>
                                                    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected" data-select2-id="19">Active</option>
                                                        <option data-select2-id="32">In-active</option>

                                                    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--below" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-s4ie-container"><span class="select2-selection__rendered" id="select2-s4ie-container" role="textbox" aria-readonly="true" title="California"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.card-body -->
                                    <div >
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
