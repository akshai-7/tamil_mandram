<div class="col-12 ">
    <a class="btn btn-primary pull-right" style="margin-top: -49px !important; " data-toggle="modal" data-target="#modal-default"> + Add Level </a>
</div>

<div class=" mt-2" width="800">
    <table id="example1" class="table table-bordered table-striped common-table">
        <thead>
            <tr>
                <th>Q.No</th>
                <th>Level </th>

                <th>Cover Image</th>
                <th>Language</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Level 1</td>
                <!-- <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</td> -->
                <td><img width="420" height="345" src="{{asset('/public/assets/dist/img/photo1.png')}}" style="width: 200px;height: 100px;"></img></td>

                <td>English</td>
                <td>
                    <div class="custom-control  custom-switch lg-btn  custom-switch-off-danger custom-switch-on-success">

                        <input type="checkbox" checked class="custom-control-input" id="customSwitch2" data-id="#div3">
                        <label class="custom-control-label" for="customSwitch2"></label>
                    </div>
                </td>
                <td>
                    <label class="mr-5"><i class="fas fa-edit" style="color:green;margin-top: 13px;" title="Edit" data-toggle="modal" data-target="#modal-default-edit"></i></label>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Level 2</td>
                <!-- <td>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</td> -->
                <td><img width="420" height="345" src="{{asset('/public/assets/dist/img/photo1.png')}}" style="width: 200px;height: 100px;"></img></td>
                <td>Arabic</td>
                <td>
                    <div class="custom-control  custom-switch lg-btn  custom-switch-off-danger custom-switch-on-success">

                        <input type="checkbox"  class="custom-control-input" id="customSwitch2" data-id="#div3">
                        <label class="custom-control-label" for="customSwitch2"></label>
                    </div>
                </td>
                <td>
                    <label class="mr-5"><i class="fas fa-edit" style="color:green;margin-top: 13px;" title="Edit" data-toggle="modal" data-target="#modal-default-edit"></i></label>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modal-default" width="800" height="900">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Level</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Level Title</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1">
                        <div class="form-group">
                            <label> Language</label>
                            <select class="form-control select2" name="user">
                                <option>Select Language</option>
                                <option value="1"> Arabic </option>
                                <option  value="2"> English</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Vimeo URL</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="text" name="email" value="" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image upload</label>
                            <div class="input-group">
                                <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                            </div>
                            <img class="cropped" src="{{ asset('public/assets/dist/img/photo.png') }} " alt="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="path_description" rows="3" placeholder=""></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Level</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Level Title</label>
                        <input type="text" name="email" value="Level 1" class="form-control" id="exampleInputEmail1">

                        <div class="form-group">
                            <label> Language</label>
                            <select class="form-control select2" name="user">
                                <option>Select Language</option>
                                <option value="1"> Arabic </option>
                                <option selected value="2"> English</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile"> Video URL</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="text" value="https://www.youtube.com/embed/tgbNymZ7vqY" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image upload</label>
                            <div class="input-group">
                                <input name="image" id="file-input" data-toggle="modal" data-target="#modal-lg" accept="image/*" class="" type="file" data-error="#errNm1">
                            </div>
                            <img class="cropped" style="margin-top: 8px;" autoplay="off" src="{{ asset('public/assets/dist/img/photo2.png') }} " alt="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="path_description" rows="3" placeholder="">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</textarea>
                        </div>
                        <video width="452" height="163" controls preload="none"  src="{{asset('/public/assets/dist/video/SECURITY.mp4')}}" controls></video>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
