
<div class="col-12">
    <a class="btn btn-primary pull-right" style="margin-top: -49px !important;" data-toggle="modal" data-target="#feed-modal-add"> + Add Question </a>
</div>
<div class="mt-2">
    <table class="table table-bordered table-striped common-table">
        <thead>
            <tr>
                <th>Q.No</th>
                <th> Type</th>
                <th>Question Item</th>

                <th style="width: 125px;">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Choose</td>

                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry..
                </td>
                <td>
                    <div class="custom-control  custom-switch  lg-btn  custom-switch-off-danger custom-switch-on-success">

                        <input checked type="checkbox" class="custom-control-input" id="customSwitch2" data-id="#div3">
                        <label class="custom-control-label" for="customSwitch2"></label>
                    </div>
                </td>
                <td>
                    <label class="mr-5"><i class="fas fa-edit" style="color:green;margin-top: 13px;" title="Edit" data-toggle="modal" data-target="#feed-modal-edit"></i></label>

                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Trur or False</td>

                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry..
                </td>
                <td>
                    <div class="custom-control  custom-switch  lg-btn custom-switch-off-danger custom-switch-on-success">

                        <input type="checkbox" class="custom-control-input" id="customSwitch2" data-id="#div3">
                        <label class="custom-control-label" for="customSwitch2"></label>
                    </div>
                </td>
                <td>
                    <label class="mr-5"><i class="fas fa-edit" style="color:green;margin-top: 13px;" title="Edit" data-toggle="modal" data-target="#feed-modal-edit"></i></label>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="feed-modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Question</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tex-cneter">
                <div class="row">

                    <div class="col-md-2 offset-md-1">
                        <div class="form-group">
                            <label> Question:  </label>
                            <br>
                             <label> 1</label>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group"><label class="label"> Language </label>
                            <select class="form-control select2 " style="width: 100%;">
                                <option> Select Language </option>
                                <option> Arabic</option>
                                <option> English </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group"><label class="label"> Questions Type</label>
                            <select class="form-control select2 question-form " style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                <option value="Div5"> Choose</option>
                                <option value="Div7"> True or False </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="inner_div">
                    <div class="Div5" style="display: none;">
                        @include('feedback.add.choose_form')
                    </div>
                    <div class="Div7" style="display: none;">
                        @include('feedback.add.trueFalse')
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-primary pull-right">Save changes</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>


<div class="modal fade" id="feed-modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Question</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tex-cneter">
                <div class="row">

                    <div class="col-md-1 offset-md-1">
                        <div class="form-group">
                            <label> Question: 1 </label>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="form-group"><label class="label"> Language </label>
                            <select class="form-control  " style="width: 100%;">
                                <option> Select Language </option>
                                <option> Arabic</option>
                                <option selected> English </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group"><label class="label"> Questions Type</label>
                            <select class="form-control  question-form " style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                <option  value="Div5"> Choose</option>
                                <option value="Div7"> True or False </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="inner_div">
                    <div class="Div5">
                        @include('feedback.edit.choose_form')
                    </div>
                    <div class="Div7" style="display: none;">
                        @include('feedback.add.trueFalse')
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-primary pull-right">Save changes</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

@push("child-scripts")

<script>
    $(document).ready(function() {
        $(document).on("changes", ".question-form", function() {
            $((this).val()).show();
        });

        $('#feed-modal-add').on('show.bs.modal', function() {
            console.log("BB");
            if ($(".question-form").val()) {
                console.log("ssss");
                $("." + $(".question-form").val()).css("display", "block")
            }
        });

        $('#feed-modal-edit').on('show.bs.modal', function() {
            if ($(".question-form").val()) {

                $("." + $(".question-form").val()).css("display", "block");
            }
        });
    });
</script>
@endpush
