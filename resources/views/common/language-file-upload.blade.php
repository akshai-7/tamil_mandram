<main class="page">
    <div class="box">
        <div class=" save hide">
            <div>
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Image Upload</h4>
                                <button type="button" class="close white-bg" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="box-2 img-result hide">
                                        <!-- result of crop -->
                                    </div>
                                    <div class="result" style="max-height:500px;"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="preview"></div>
                                </div>
                                <!-- input file -->
                                <div class="box">
                                    <div class="options hide">
                                        <input type="hidden" class="img-w" value="300" min="300" max="300" />
                                    </div>
                                    <!-- save btn -->
                                    <!-- <button class="btn save hide">Save</button> -->

                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary save-button"> Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <img class="preview_image" style="max-width:400px; max-height:400px; min-width:200; min-height:200px;" src="{{$img ? $img : ''}}" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
            </div>
        </div>
    </div>
</div><!-- /.modal -->


@push("child-scripts")
<script>
    $(document).ready(function() {

        $('#modal-lg').on('hidden.bs.modal', function() {
            if (!$(".hidden-preview-img").val() && $(".preview-img").attr('src') !="") {
                $("#file-input").val("");
            }
        })



        // vars
        let result = document.querySelector('.result'),
            img_result = document.querySelector('.img-result'),
            img_w = document.querySelector('.img-w'),
            img_h = document.querySelector('.img-h'),
            options = document.querySelector('.options'),
            save = document.querySelector('.save'),
            save_button = document.querySelector('.save #save-button'),
            cropped = document.querySelector('.cropped'),
            dwn = document.querySelector('#download'),
            upload = document.querySelector('#file-input'),
            preview_image = document.querySelector('.preview_image'),
            hidden_preview_img = document.querySelector('.hidden-preview-img'),
            cropper = '';

        var minCroppedWidth = 320;
        var minCroppedHeight = 160;
        var maxCroppedWidth = 640;
        var maxCroppedHeight = 320

        var $image = $('#image'),
            height = $image.height() + 4;

        $('.preview').css({
            width: '100%', //width,  sets the starting size to the same as orig image
            overflow: 'hidden',
            height: height,
            maxWidth: $image.width(),
            maxHeight: height
        });



        // on change show image with crop options
        upload.addEventListener('change', e => {
            if (e.target.files.length) {

                $("#modal-lg").modal("toggle");
                console.log("AAAA");

                setTimeout(function() {
                        const reader = new FileReader();
                        reader.onload = e => {
                            if (e.target.result) {
                                // create new image
                                let img = document.createElement('img');
                                img.id = 'image';
                                img.src = e.target.result;
                                // clean result before
                                result.innerHTML = '';
                                // append new image
                                result.appendChild(img);
                                // show save btn and options

                                if (save && options) {
                                    save.classList.remove('hide');
                                    options.classList.remove('hide');
                                }


                                cropper = new Cropper(img, {
                                    dragMode: 'move',
                                    strict: false,
                                    preview: '.preview',
                                    aspectRatio: "none",
                                    // autoCropArea: 1,
                                    minContainerHeight: 100,
                                    minContainerWidth: 200,
                                    minCanvasHeight: 200,
                                    minCanvasWidth: 100,
                                    minContainerHeight: 50,
                                    zoomable: true,
                                    // // restore: false,
                                    // // guides: true,
                                    viewMode: 1,
                                    // dragMode: 1,
                                    center: true,
                                    zoomable: true,
                                    zoomOnTouch: true,
                                    zoomOnWheel: true,
                                    // highlight: true,
                                    dragCrop: true,
                                    cropBoxMovable: true,
                                    cropBoxResizable: true,
                                    // toggleDragModeOnDblclick: true,

                                    data: {
                                        width: 32,
                                        height: 32,
                                    },
                                });

                                // cropper.zoomTo(.5, {
                                //     x: containerData.width / 2,
                                //     y: containerData.height / 2,
                                // });
                                // init cropper
                                // cropper = new Cropper(img, {
                                //     autoCropArea: 0,
                                //     strict: false,
                                //     guides: true,
                                //     highlight: false,
                                //     dragCrop: true,
                                //     zoomable: true,
                                //     zoomOnTouch: true,
                                //     zoomOnWheel: true,
                                //     viewMode: 3,
                                //     dragMode: 3,
                                //     cropBoxResizable: true,
                                //     data: {
                                //         width: (minCroppedWidth + maxCroppedWidth) / 2,
                                //         height: (minCroppedHeight + maxCroppedHeight) / 2,
                                //     },

                                //     crop: function(event) {
                                //         var width = Math.round(event.detail.width);
                                //         var height = Math.round(event.detail.height);
                                //         try {
                                //             if (
                                //             width < minCroppedWidth ||
                                //             height < minCroppedHeight ||
                                //             width > maxCroppedWidth ||
                                //             height > maxCroppedHeight
                                //         ) {
                                //             cropper.setData({
                                //                 width: Math.max(minCroppedWidth, Math.min(maxCroppedWidth, width)),
                                //                 height: Math.max(minCroppedHeight, Math.min(maxCroppedHeight, height)),
                                //             });
                                //         }
                                //         } catch(e) {

                                //         }
                                //     }
                                // });

                            }
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    }
                , 500);
            }
            // start file reader

        });

        save.addEventListener('click', e => {
            // save on click
            var target = e.target;
            if ($(target).hasClass("save-button")) {

                e.preventDefault();
                // get result to data uri
                let imgSrc = cropper.getCroppedCanvas({
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high',
                }).toDataURL();
                // remove hide class of img
                cropped.classList.remove('hide');
                img_result.classList.remove('hide');
                // show image cropped
                cropped.src = imgSrc;
                preview_image.src = imgSrc;
                $(".preview-img").addClass("lg");
                hidden_preview_img.value = imgSrc;
                if (dwn) {
                    dwn.download = 'imagename.png';
                    dwn.setAttribute('href', imgSrc);
                    $("#modal-lg").modal("toggle");
                    $(".modal-backdrop").hide();
                }

                $("#modal-lg").modal("toggle");
                $(".modal-backdrop").hide();
            }
        });
    });
</script>
@endpush
