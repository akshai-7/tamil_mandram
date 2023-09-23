@extends('app')
@section('content')
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #0092CA;
    }

    .card-primary:not(.card-outline)>.card-header {
        background-color: #0092CA;
    }

    .btn:not(:disabled):not(.disabled) {
        background-color: #0092CA;
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
    .hover1{
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

button, input[type="submit"], input[type="reset"] {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
body {font-family: "Lato", sans-serif;}

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

/* Float the list items side by side */
ul.tab li {float: left;}

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
                        <li class="breadcrumb-item"><a href="{{url('organisation')}}"   class="hover1" >Organisation List</a></li>
                        <li class="breadcrumb-item active">Organisation</a></li>
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

  <li><a href="#" class="tablinks" onclick="openCity(event, 'London')">Organisation Detail</a></li>
  <li><a href="#" class="tablinks" onclick="openCity(event, 'Paris')">Organisation Settings</a></li>
  <li><a href="#" class="tablinks" >Reset Password</a></li>

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
<form id="Paris"   action="{{route('Addlearningpathtitle')}}"  class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
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
<option  value="1">Active</option>
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
<option  value="1">Active</option>
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
<option  value="1">Active</option>
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
<option  value="1">Active</option>
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
<option  value="1">Active</option>
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
<option  value="1">Active</option>
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
<option  value="1">Active</option>
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-2">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card-body">
                <div class="form-group">
                <input type="text" name="learning_path_title"  value="Hari" class="form-control" id="learning_path_title">

                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="card-body">
                <div class="form-group">
                    <label style="display: block ruby;" for="exampleInputEmail1" >Password</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-body">
                <div class="form-group">
                <input type="password" name="learning_path_title" class="form-control"  value="12345"  id="learning_path_title" readonly>

                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card-body">
                <div class="form-group" >
                <button type="button" value="" class="btn btn-primary" onclick="openCity(event, 'edit')">Reset Password</button>

                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
                                <button type="submit" value="" class="btn btn-primary">Submit</button>
                            </div>
</form>
<div>

<form id="edit"  action="{{route('Addlearningpathtitle')}}"  class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
@csrf

    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Enter Password">
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Conform Password</label>
                    <input type="password" name="learning_path_title" class="form-control" id="myInput" placeholder="Enter Conform Password">
                </div>
            </div>
        </div>                                <div class="col-md-3">
            <div class="card-body">
                <div class="form-group">
                    <button type="button" style="position: relative;
top: 23px;
" value="" class="btn btn-primary"  onclick="myFunction()">Password Copy         <i class="fa fa-copy" style=""></i></button>
                </div>
            </div>
        </div>





    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" value="" class="btn btn-primary">Reset Password</button>
    </div>
</form>
</div>                        </div>
<div>

                        <form id="London"  action="{{route('Addlearningpathtitle')}}"  class="tabcontent" method="POST" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                        @csrf

                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Organisation Name</label>
                                            <input type="text" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Organisation Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Organisation Code</label>
                                            <input type="text" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Organisation Code">
                                        </div>
                                    </div>
                                </div>                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email ID</label>
                                            <input type="email" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Email ID">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input type="file"  name="image" class="form-control" rows="3" ></input>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Contract Expiry Date</label>
                                            <input type="date" name="learning_path_title" class="form-control" id="learning_path_title" placeholder="Email ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                        <label>Current status</label>
                  <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                    <option selected="selected">Select Current status</option>
                    <option  value="1">Active</option>
                    <option value="0">In-active</option>

                  </select> </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" value="" class="btn btn-primary">Submit</button>
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
        function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
}

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
