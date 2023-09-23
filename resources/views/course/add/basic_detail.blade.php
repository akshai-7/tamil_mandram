<form id="London" class="tabcontent" class="card-body" style="padding: 5px;">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Course Title</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label> Learning Path </label>
                <select class="form-control select2">
                    <option value="">Please Select...</option>
                    <option value="">Construction technology</option>
                    <option value="">Mechanical inspection</option>
                    <option value="">Building inspection</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" rows="3" placeholder=""></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label>Current status</label>
            <div class="form-group">
                <div class="custom-control  custom-switch lg-btn  custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" checked class="custom-control-input" id="customSwitch3">
                    <label class="custom-control-label" for="customSwitch3"></label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>
