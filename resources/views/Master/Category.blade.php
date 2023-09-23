@extends('app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>

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
    [data-from-dependent] {
  display: none;
}

[data-from-dependent].display {
  display: initial;
}
[data-from-dependents] {
  display: none;
}

[data-from-dependents].display {
  display: initial;
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
                        <li class="breadcrumb-item active">Category</li>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <select class="form-control" name="current_status" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                        <option selected="selected">Select User Name</option>
                                                        <option value="1">Hari</option>
                                                        <option value="2">Siva</option>
                                                        <option value="3">Prabhu</option>
                                                    </select>
                                                </div>


                                  </div>
                                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>




<div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>User Name</label>

                                                   <input type="text" class="form-control">
                                                </div>


                                  </div>
                                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Assign</button>
      </div>
      </form>

    </div>
  </div>
</div>
          <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                            <button type="button" style="color: white;float: right;"  class="btn " data-toggle="modal" data-target="#exampleModal" >Add Category</button>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>

                                        <td>test</td>
                                        <td><span class="badge bg-danger">In-active</span></td>

                                        <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModaledit"> <span style="color:green;" class="glyphicon glyphicon-pencil"></span></a>


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
    <script>
        var subjectObject = {
  "test1": {
    "Cat1": ["Course1", "Course2"],
    "Cat2": ["Course3"],

  },
  "test2": {
    "Cat3": ["Course4", "Course5"]
  }
}
window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  var chapterSel = document.getElementById("chapter");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}



// var subjectObject1 = {
//   "test1": {
//     "Cat1": ["Course1", "Course2"],
//     "Cat2": ["Course3"],

//   },
//   "test2": {
//     "Cat3": ["Course4", "Course5"]
//   }
// }
// window.onload = function() {
//   var subjectSel = document.getElementById("subject1");
//   var topicSel = document.getElementById("topic1");
//   var chapterSel = document.getElementById("chapter1");
//   for (var x in subjectObject1) {
//     subjectSel.options[subjectSel.options.length] = new Option(x, x);
//   }
//   subjectSel.onchange = function() {
//     //empty Chapters- and Topics- dropdowns
//     chapterSel.length = 1;
//     topicSel.length = 1;
//     //display correct values
//     for (var y in subjectObject1[this.value]) {
//       topicSel.options[topicSel.options.length] = new Option(y, y);
//     }
//   }
//   topicSel.onchange = function() {
//     //empty Chapters dropdown
//     chapterSel.length = 1;
//     //display correct values
//     var z = subjectObject1[subjectSel.value][this.value];
//     for (var i = 0; i < z.length; i++) {
//       chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
//     }
//   }
// }







$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Add Category')
  modal.find('.modal-body input').val(recipient)
})

$('#exampleModaledit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Course Assign Edit')
  modal.find('.modal-body input').val(recipient)
})
        </script>
</div>


@endsection
