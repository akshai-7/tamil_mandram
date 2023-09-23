@extends('app')
@section('content')
<style>
    .maring-left {
        margin: 12px 12px;
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
                        <li class="breadcrumb-item "> <a  href="{{ route('courselist')}}" class="hover1">Course</li>
                        <li class="breadcrumb-item active "> &nbsp; / <a> Add Course </a></li>
                    </ol>
                    <a class="btn btn-primary  pull-right" href="{{ url('courselist') }}">Back</a>
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


                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1" aria-selected="true">1. Course Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-2" role="tab" aria-controls="custom-tabs-one-2" aria-selected="false">2. Course Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3" aria-selected="false">3. Level Content</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-4" role="tab" aria-controls="custom-tabs-one-4" aria-selected="false">4. Course Question </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-5" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">5. Feedback </a>
                                </li>
                            </ul>
                        </div>


                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-1" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="card-body">
                                        @include('course.edit.basic_detail')
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="custom-tabs-one-2" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    @include('course.edit.setting')
                                </div>
                                <div class="tab-pane fade " id="custom-tabs-one-3" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    @include('course.edit.level_content')
                                </div>
                                <div class="tab-pane fade " id="custom-tabs-one-4" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    @include('course.edit.question.list')
                                </div>
                                <div class="tab-pane fade " id="custom-tabs-one-5" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    @include('feedback.add.list')
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function show1() {
            document.getElementById('div1').style.display = 'block';
        }

        function show2() {
            document.getElementById('div1').style.display = 'none';
        }

        function show3() {
            document.getElementById('div2').style.display = 'block';
        }

        function show4() {
            document.getElementById('div2').style.display = 'none';
        }

        function show5() {
            document.getElementById('div3').style.display = 'block';
        }

        function show6() {
            document.getElementById('div3').style.display = 'none';
        }

        function show7() {
            document.getElementById('div4').style.display = 'block';
        }

        function show8() {
            document.getElementById('div4').style.display = 'none';
        }

        $(document).ready(function() {

            $(document).on("click", ".custom-switch", function(e) {
                var input = $(this).find('.custom-control-input');

                if (!input.is(':checked')) {
                    input.prop("checked", true)
                    $(input.data("id")).show();
                } else {
                    input.prop("checked", false)
                    $(input.data("id")).hide();
                }
            });

            $(document).on("change", "#modal-edit .question-form", function() {
                console.log($(this).val());

                if ($(this).val()) {

                    divVisibility1($(this).val());
                }
            });

        });


        $(document).ready(function() {
            $(document).on("change", "#modal-add .question-form", function() {
                console.log($(this).val());

                if ($(this).val()) {
                    divVisibility1($(this).val());
                }
            });

            $(document).on("change", "#feed-modal-add .question-form", function() {
                console.log($(this).val());

                if ($(this).val()) {
                    divVisibility1($(this).val());
                }
            });

        });
        // function numofGuests(val) {
        //     document.getElementById('guestFormOne').innerHTML = "";
        //     for (i = 0; i < parseInt(val.value); i++) {
        //         document.getElementById('guestFormOne').innerHTML += '<p><div class="row"><div class="col-md-4"><div class="modal-body" >  <input type="email" name="email" class="form-control" id="exampleInputEmail1" ></div> </div><div class="col-md-1"> <div ><input type="radio" name="email" style="width: 20px;"class="form-control" id="exampleInputEmail1" > </div></div><div class="col-md-2" style="position: relative;left: 100px;"><div ><div _ngcontent-c7="" class="test-img1 voice-record-icon col-xs-12 col-sm-4 col-md-4 col-lg-4"><div _ngcontent-c7="" class="clearfix" style="display: block ruby;"><a _ngcontent-c7="" class="handpic"><input _ngcontent-c7="" accept="audio/*" class="audio_file" display="none" name="file_source" size="40" type="file"></a></div></div></div></div><div class="col-md-3" style="position: relative;left: 130px;"> <div><div _ngcontent-c7="" class="audio_align_1 col-xs-12 col-sm-8 col-md-8 col-lg-8"><audio _ngcontent-c7="" controls="" controlslist="nodownload" id="player" preload="auto" type="audio/mpeg" src="https://driver.smartlabour.ae/RaktaAPI/"></audio></div></div></div></div></p>';
        //     }
        // }
        var divs = ["Div1", "Div2", "Div3", "Div4"];
        var visibleDivId = null;

        function divVisibility(divId) {
            console.log("sdsd");
            if (visibleDivId === divId) {
                visibleDivId = null;
            } else {
                visibleDivId = divId;
            }
            hideNonVisibleDivs();
        }

        function hideNonVisibleDivs() {
            var i, divId, div;
            for (i = 0; i < divs.length; i++) {
                divId = divs[i];
                div = document.getElementById(divId);
                if (visibleDivId === divId) {
                    div.style.display = "block";
                } else {
                    div.style.display = "none";
                }
            }
        }


        var divss = ["Div5", "Div6", "Div7"];
        var visibleDivId = null;

        function divVisibility1(divId) {
            if (visibleDivId === divId) {
                visibleDivId = null;
            } else {
                visibleDivId = divId;
            }
            hideNonVisibleDivss();
        }

        function hideNonVisibleDivss() {
            var i, divId, div;
            for (i = 0; i < divs.length; i++) {
                divId = divss[i];
                if (visibleDivId === divId) {
                    $('.' + divId).css("display", "block")
                } else {
                    $('.' + divId).css("display", "none")
                }
            }
        }
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {

                        $(".box").not("." + optionValue).hide();
                        // $(".box1").not("." + optionValue).show();

                        $("." + optionValue).show();


                    } else {
                        $(".box").hide();


                    }
                });
            }).change();
        });
        $(document).ready(function() {
            $("div.desc").hide();
            $("input[name$='cars']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#" + test).show();
            });
        });
    </script>

    @endsection
