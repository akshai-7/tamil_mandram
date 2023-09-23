@extends('app')
@section('content')

<style>

    .modal-content {
        width: 806px;
        margin-left: -100px;
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
                        <li class="breadcrumb-item"><a href="{{url('learningpathlist')}}">Course Assign</a></li>
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
                    <div class="card collapsed-card search-card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Search Reports</h4>
                            </div>
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


                                            <div class="col-md-3">
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
                                                    <label> Status</label>
                                                    <select class="form-control select2" name="user">
                                                        <option>Select Status</option>
                                                        <option value="1">Active </option>
                                                        <option value="0">In Active </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-4">
                                                <div class="form-group">
                                                    <label></label>
                                                    <button class="btn btn-primary pull-right"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title "></div>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-lg"> + Assign Course</button>

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User Name</th>
                                        <th>Learning Path</th>
                                        <!-- <th>Category</th> -->
                                        <th>Course</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>COR-001</td>
                                        <td>Abdul Alim</td>
                                        <td>Construction technology</td>

                                        <!-- <td>Introduction </td> -->
                                        <td>Scaffolding</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a class="remove" title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>COR-002</td>
                                        <td>Dawoud</td>
                                        <td>Mechanical inspection</td>

                                        <!-- <td>General</td> -->
                                        <td>Inspecting heating</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a class="remove" title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>COR-003</td>
                                        <td>Shakir</td>
                                        <td>Building inspection</td>

                                        <!-- <td>Summary</td> -->
                                        <td>ventilation systems</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <a class="remove" title="Delete"> <i class="fa fa-trash" style="color:red"></i></a>
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

    <div class="modal fade " id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" width=900>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Assign Course</h5>
                    <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <label>Select User</label>
                                            <select name="from" id="undo_redo" class="form-control" size="13" multiple="multiple">
                                                <option value="1">Abdul Alim</option>
                                                <option value="2">Dawoud</option>
                                                <option value="3">Shakir</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-2">
                                            <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                                            <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="fa fa-angle-double-right"></i></button>
                                            <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="fa fa-angle-right"></i></button>
                                            <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="fa fa-angle-left"></i></button>
                                            <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="fa fa-angle-double-left"></i></button>
                                            <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                                        </div>

                                        <div class="col-lg-5">
                                            <select name="to" id="undo_redo_to" class="form-control" size="13" multiple="multiple"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Learning Path</label>
                                        <select class="form-control select2" name="subject" id="subject">
                                            <option value="1"> General Administration</option>
                                            <option value="2"> Inspecting heating</option>
                                            <option value="3"> ventilation systems </option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>

                                        <select class="form-control select2" name="topic" id="topic">
                                            <option value="" selected="selected">Select Category</option>
                                            <option value="1"> Introduction </option>
                                            <option value="2"> General </option>
                                            <option value="2"> Summary </option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select class="form-control select2" name="chapter" id="chapter">
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
</div>
@endsection

@push("child-scripts")

<script src="{{ asset('public/assets/plugins/multiple-select/multiselect.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Add Course Assign')
            modal.find('.modal-body input').val(recipient)
        })

        $('#exampleModaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Course Assign Edit')
            modal.find('.modal-body input').val(recipient)
        })

        $('#undo_redo').multiselect();

    });
</script>

@endpush
