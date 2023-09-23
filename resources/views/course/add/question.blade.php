<div class="row">
    <div class="col-12 ">
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-add">Add Question </a>
    </div>
</div>
<div class="card-body mt-2">
    <table class="table table-bordered table-striped common-table">
        <thead>
            <tr>
                <th>Q.No</th>
                <th>Question Type</th>
                <th>Question Item</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Choose</td>

                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry..
                </td>
                <td><span class="badge bg-success">Active</span></td>
                <td><i class="fas fa-edit" style="color:green" data-toggle="modal" data-target="#modal-edit"></i> <button type="button" class="btn" style="background-color: #982626;color:white"><a href="" style="color:white" class="hover">Disable</a></button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Trur or False</td>

                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry..
                </td>
                <td><span class="badge bg-success">Active</span></td>
                <td><i class="fas fa-edit" style="color:green" data-toggle="modal" data-target="#modal-edit"></i> <button type="button" class="btn" style="background-color: #982626;color:white"><a href="" style="color:white" class="hover">Disable</a></button></td>
            </tr>
        </tbody>
    </table>
</div>


<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Question</h4>
                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tex-cneter">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label> Question: 1 </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="display: block ruby;"><label> Language </label>
                            <select class="form-control select2 " style="width: 100%;">
                                <option> Select Language </option>
                                <option> Arabic</option>
                                <option> English </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" style="display: block ruby;"><label> Assessment Type</label>
                            <select class="form-control select2 question-form " style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                <option value="Div5"> Choose</option>
                                <option value="Div6"> Fill in the blanks</option>
                                <option value="Div7"> True or False </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="inner_div">

                    <div class="Div5" style="display: none;">
                        <div class="col-md-3" style="float: right;">
                            <div class="modal-body" style="position: relative;left: 154px;">

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-10">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <textarea style="border:0;border: 2px dotted;" class="form-control" rows="3" placeholder="Type your question hear"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <img _ngcontent-c7="" src=" {{asset('/public/assets/dist/img/voice.png')}}">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                Correct Answer
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="modal-body">
                                    <input type="radio" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="modal-body">
                                    <input type="radio" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="modal-body">
                                    <input type="radio" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="modal-body">
                                    <input type="radio" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="modal-body">
                                    <input type="radio" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                        </div>

                        <!-- <div id="guestFormOne"></div> -->
                    </div>

                    <div class="Div6" style="display: none;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="modal-body">
                                    <div class="form-group">

                                        <input type="text" style="border:0;border: 2px dotted;" class="form-control" rows="3" placeholder="Type the question hear">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="modal-body">
                                    <div class="form-group">

                                        <input type="text" class="form-control" rows="3" placeholder="Answer block" disabled type="text" id="two">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div class="form-group">

                                        <input type="text" style="border:0;border: 2px dotted;" class="form-control" rows="3" placeholder="Type the question hear">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <img _ngcontent-c7="" src=" {{asset('/public/assets/dist/img/voice.png')}}">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-4">
                                Correct Answer
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">

                                    <input oninput='document.getElementById("two").value = this.value' type="text" id="one" name="email" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="modal-body" style="display: block ruby;">
                                    <label>Answer Weightage</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1">
                                    <label>Mark</label>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="Div7" style="display: none;">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="modal-body">
                                    <div class="form-group">

                                        <textarea style="border:0;border: 2px dotted;" class="form-control" rows="3" placeholder="Type your question hear"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div _ngcontent-c7="" class="clearfix" style="display: block ruby;">
                                            <a _ngcontent-c7="" class="handpic">
                                                <img _ngcontent-c7="" src=" {{asset('/public/assets/dist/img/voice.png')}}">
                                                <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="modal-body">
                                    <div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">

                            </div>
                            <div>

                            </div>

                            <div class="col-md-4">
                                Correct Answer
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="modal-body" style="display: block ruby;">
                                    <label>A</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div>
                                    <input type="radio" value="red" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2 red box" style="display: block ruby;">
                                <div style="display: block ruby;">
                                    <label>Answer Weightage</label>
                                    <input type="input" name="email" class="form-control" id="exampleInputEmail1">
                                    <label>Mark</label>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="modal-body" style="display: block ruby;">
                                    <label>B</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div>
                                    <input type="radio" value="green" name="email" style="width: 20px;" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div class="col-md-2 green box" style="display: block ruby;">
                                <div style="display: block ruby;">
                                    <label>Answer Weightage</label>
                                    <input type="input" name="email" class="form-control" id="exampleInputEmail1">
                                    <label>Mark</label>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
