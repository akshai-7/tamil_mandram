<div class="row " style="padding:15px;">
    <div class="col-md-4">
        <div class="form-group">
            <label class="lable">Question </label>
            <input type="text" style="border:0;border: 2px dotted;" class="form-control" rows="3" placeholder="Type the question hear">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="lable">Answer </label>
            <input type="text" class="form-control" rows="3" placeholder="Answer block" disabled type="text" id="two">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label class="lable">Question </label>
            <input type="text" style="border:0;border: 2px dotted;" class="form-control" rows="3" placeholder="Type the question hear">
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-4">
        <div class="form-group">
            <label>Questions Audio</label><br>
            <label> <img _ngcontent-c7="" src=" {{asset('/public/assets/dist/img/voice.png')}}"></label>
            <input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-conrol">
            <label>Correct Answer</label><br>
            <input oninput='document.getElementById("two").value = this.value' type="text" id="one" name="email" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
    <div _ngcontent-c7="" class=""><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div>
    </div>
</div>
