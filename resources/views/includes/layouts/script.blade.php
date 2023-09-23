<script src="{{ asset('/public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- jquery-validation -->
<!-- <script src="{{ asset('/public/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script> -->
<!-- <script src="{{ asset('/public/assets/plugins/jquery-validation/additional-methods.min.js') }}"></script> -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/public/assets/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('/public/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Cropper CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
<!-- Cropper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>
<!-- AdminLTE for demo purposes -->

<script src=" {{ asset('/public/assets/plugins/chart.js/Chart.min.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{ asset('/public/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/public/assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>

@stack('child-scripts')

<script></script>

<script>
    $(document).ready(function() {



        $(".select2").select2();
        $(".datepicker").datepicker({
            format: 'mm-dd-YYYY'
        });
        $('[data-toggle="tooltip"]').tooltip();
        $('a').tooltip();
        $('.fa,.fas').tooltip();

        setTimeout(function() {
            $('.buttons-excel').attr('data-toggle', 'tooltip');
            $('.buttons-excel').tooltip();
        }, 1000);

        $('.summernote').summernote({

            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        })


        $(".alert.alert-success").fadeOut(5000);
        $(".alert.alert-danger").fadeOut(5000);




        var myElement = $('.summernote');

        myElement.summernote({
            // See: http://summernote.org/deep-dive/
            callbacks: {
                // Register the `onChnage` callback in order to listen to the changes of the
                // Summernote editor. You can also use the event `summernote.change` to handle
                // the change event as follow:
                //   myElement.summernote()
                //     .on("summernote.change", function(event, contents, $editable) {
                //       // ...
                //     });
                onChange: function(contents, $editable) {
                    // Note that at this point, the value of the `textarea` is not the same as the one
                    // you entered into the summernote editor, so you have to set it yourself to make
                    // the validation consistent and in sync with the value.
                    myElement.val(myElement.summernote('isEmpty') ? "" : contents);

                    // You should re-validate your element after change, because the plugin will have
                    // no way to know that the value of your `textarea` has been changed if the change
                    // was done programmatically.
                    v.element(myElement);
                }
            }
        });


        $(document).on("click", ".custom-control-label:not('.no-change')", function(e) {
            e.stopPropagation();
            if ($(".custom-control-input").is(":checked")) {
                $(".custom-control-input").attr("checked", false);
            } else {
                $(".custom-control-input").attr("checked", true);
            }
        });

    });


    $(function() {

        $("#example1,.common-table").DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: '<i data-toggle="tooltip" title ="Excel" class="fa fa-file-excel green pull-right"></i>',
                titleAttr: 'Export Excel'

            }, ],

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            }, ],
        });
    });

    $(function() {
        var url = window.location;
        var additionalUrl = $(".hover1").attr('href');
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active');

        $('ul.nav-sidebar a').filter(function() {
            return this.href == additionalUrl;
        }).addClass('active');


        $('ul.nav-treeview a').filter(function() {
                // console.log(url);
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({
                'display': 'block'
            })
            .addClass('menu-open ').prev('a')
            .addClass('active');

        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function() {
                // console.log(url);
                return this.href == additionalUrl;
            }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({
                'display': 'block'
            })
            .addClass('menu-open ').prev('a')
            .addClass('active');
    });




    $('.del-user').click(function(event) {
        swal({
                title: `Are you sure you want to delete user?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("success", "User deleted Successfully..!", "success");
                }
            });
    });

    $('.delete_category').click(function(event) {
        swal({
                title: `Are you sure you want to remove category?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("success", "User Course canceled..!", "success");
                }
            });
    });

    $('.remove').click(function(event) {
        swal({
                title: `Are you sure you want to cancel user course?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("success", "User Course canceled..!", "success");
                }
            });
    });
</script>
