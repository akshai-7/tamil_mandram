<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clients iOrgapp</title>
    <link rel="shortcut icon" href="{{asset('/public/image/logo.png') }} ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/public/assets/dist/css/adminlte.min.css')}}">
    <!-- <link rel="stylesheet" href="{{ asset('public/assets/plugins/font-awesome/css/font-awesome.min.css') }}"> -->


    <link rel="stylesheet" href="{{asset('/public/assets/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('/public/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{asset('/public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">




    <style>
        .card-primary:not(.card-outline)>.card-header {
            background-color: #fff;
            border: 0px;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .card.card-tabs:not(.card-outline)>.card-header {
            padding: 12px !important;
            background: #fff;
        }

        .card.card-tabs:not(.card-outline)>.card-header .nav-item:first-child .nav-link {
            margin-top: -5px;
            padding: 11px;


        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 5px solid;
        }

        .card.card-tabs li>.nav-item {
            border: 0px;
            padding: 1px;
        }

        .tab-content {
            padding-top: 20px;
        }

        .select2-container .select2-selection--single {
            height: 38px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #636363;
        }

        .nav-tabs .nav-link {
            margin-top: -5px;
            padding: 11px;
            border-bottom: 4px solid;
            line-height: 13.5px;
        }

        .card-primary:not(.card-outline)>.card-header,
        .card-primary:not(.card-outline)>.card-header a {
            color: #b8a6a6;
        }

        .btn-primary {
            background-color: #02468F;
            margin: 10px !important;

        }

        .card-title {
            font-size: 16px;
        }

        .card .card-header .card-title .btn-primary {
            margin: 10px !important;
        }

        .table.dataTable>thead>tr>th:not(.sorting_disabled),
        table.dataTable>thead>tr>td:not(.sorting_disabled) {
            background-color: #02468F;
            color: #fff;
        }

        .page-item active {
            background-color: #02468F;

        }

        a {
            text-decoration: none;
            background-color: #ae949400;
            color: #151644;
        }

        .active {
            /* color:red; */
        }

        ol {
            list-style: none;
        }

        ul {
            list-style: none;

        }

        .back-btn>a {
            color: #fff;
        }

        .card .card-custom-header {
            background-color: #02468F !important;
        }

        .card-header.card-custom-header>.card-title {
            color: #fff;
        }

        .back-btn .btn-primary:hover {

            color: #fff;
            background-color: #02468F;
            border-color: #02468F;
        }

        .btn-primary.focus,
        .btn-primary:focus {

            color: #fff;
            background-color: #02468F;
            border-color: #02468F;
        }

        /* .upload-box{
    max-width: 94px;
    height: 85px;
    border: 1px solid;
    background-image: url("{{ asset('public/upload-img.png')}}");
    background-repeat: no-repeat;
    background-position: center;
 } */

        .modal-header {
            background: #02468F;
            padding: 10px;
            color: #fff;
        }


        .modal-title {
            margin-bottom: 0;
            line-height: 1;
            padding: 2px 10px 1px;
            font-size: 18px;
            font-weight: 500;
            font-style: revert;
        }

        .cropped {
            width: 80px !important;
            height: 63px !important;
            padding-top: 0px !important;
        }

        .search-card .card-header {
            padding: 8px !important;
        }

        .search-card .card-header .card-tools {
            margin-right: -0.4rem;
        }

        .search-card .card-header .card-title {
            font-size: 16px;
            margin-top: 10px;

        }

        .search-card .card-header .card-title h4 {
            text-transform: uppercase;
        }

        .search-card .card-header .card-tools .btn-tool {
            height: 36px;
            width: 37px;
            margin: 10px;
        }

        .card.custom-card .card-header {
            padding: 0px;
        }

        .custom-control .custom-switch {
            padding-left: 2.5rem !important;
        }

        .custom-switch.lg-btn .custom-control-label::before {
            left: -2.25rem;
            width: 6.25rem;
            pointer-events: all;
            border-radius: 5.5rem;
            height: 2.2em;
        }

        .custom-switch.lg-btn .custom-control-label::before {
            left: -2.4rem;
            width: 6.25rem;
            pointer-events: all;
            border-radius: 5.5rem;
            height: 2.5em;
        }

        .custom-switch.lg-btn .custom-control-label::after {
            top: calc(0.25rem + 4px);
            left: calc(-4.15rem + 27px);
            width: calc(1rem - -13px);
            height: calc(1rem - -13px);
            border-radius: 0.8rem;
        }


        .custom-switch.lg-btn .custom-control-input:checked~.custom-control-label::after {
            -webkit-transform: translateX(.75rem);
            transform: translateX(4.35rem)
        }

        .custom-switch.lg-btn.custom-switch-on-success .custom-control-input:checked~.custom-control-label::before {
            background-color: #28a745;
            border-color: #145523;
            content: "Active";
            font-size: 14px;
            margin: 2px;
            color: aliceblue;
            /* padding: 0px 18px 0px 21px; */
            font-family: revert;
            padding: 6px 24px;
        }

        .custom-switch.lg-btn.custom-switch-off-danger .custom-control-input~.custom-control-label::before {

            content: "Deactive";
            font-size: 14px;
            margin: 2px;
            color: aliceblue;
            padding: 5px 1px 5px 36px;
            font-family: revert;
            color: #141010;

        }

        .custom-switch.custom-switch-off-danger .custom-control-input~.custom-control-label::after {
            margin: 1px 4px;
        }


        .custom-switch.lg-btn.btn-active .custom-control-label::before {
            left: -2.25rem;
            width: 3.75rem;
            pointer-events: all;
            border-radius: 5.5rem;
            height: 1.2em;
        }

        .custom-switch.lg-btn.btn-active .custom-control-label::before {
            left: -2.4rem;
            width: 2.75rem;
            pointer-events: all;
            border-radius: 5.5rem;
            height: 1.5em;
        }

        .custom-switch.lg-btn.btn-active .custom-control-label::after {

            top: calc(0.25rem + 2px);
            left: calc(-4.15rem + 30px);
            width: calc(1rem - -5px);
            height: calc(1rem - -8px);
            border-radius: 0.8rem;
        }


        .custom-switch.lg-btn.btn-active .custom-control-input:checked~.custom-control-label::after {
            -webkit-transform: translateX(.75rem);
            transform: translateX(1.35rem)
        }

        .custom-switch.lg-btn.btn-active.custom-switch-on-success .custom-control-input:checked~.custom-control-label::before {
            background-color: #28a745;
            border-color: #145523;
            content: "";
            font-size: 16px;
            margin: 2px;
            color: aliceblue;

            font-family: revert;
        }

        .custom-switch.lg-btn.btn-active.custom-switch-off-danger .custom-control-input~.custom-control-label::before {

            content: "";
            font-size: 16px;
            margin: 2px;
            color: aliceblue;

            font-family: revert;

        }

        audio {
            height: 32px;
            width: 275px;
        }

        .custom-switch.custom-switch-off-danger .custom-control-input~.custom-control-label::before {
            background-color: #f1f1f1;
            border-color: #aca9a9;
            /* background-color: #e74c3c;
    border-color: #e01125; */
        }

        .custom-switch.custom-switch-off-danger .custom-control-input~.custom-control-label::after {
            background-color: #ccc;
            /* background-color: #ff8a95db; */
        }

        .nav-item p {
            margin-left: 9px !important;
            font-weight: unset;
        }

        .breadcrumb-item:first-child a {
            color: #02468F;
        }

        .table.table-striped.dataTable.tbody td {
            background: #fff !important;
        }

        .card-primary:not(.card-outline)>.card-header a.active {
            color: #02468F;
        }

        .card-primary:not(.card-outline)>.card-header,
        .card-primary:not(.card-outline)>.card-header a {
            color: #bb8b15;
        }

        label {
            font-weight: unset !important;
        }

        .fa {
            font-weight: unset;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            color: #151644;
        }

        .table.table-bordered.dataTable tbody th,
        table.table-bordered.dataTable tbody td {
            background: #fff;
        }

        .table.dataTable>thead>tr>th:not(.sorting_disabled),
        table.dataTable>thead>tr>td:not(.sorting_disabled) {
            font-weight: unset;
        }

        .dataTables_wrapper .form-control {
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
            background-repeat: no-repeat;
            background-color: #fff;
            background-position: 0px 3px !important;
        }

        .dataTables_wrapper .form-control-sm {
            padding: 0.25rem 1.2rem;
        }

        .info a:hover {
            color: #151644 !important;
        }

        label {
            color: #151644 !important;
        }

        tbody tr:hover {
            background-color: #EBEEF315;
        }

        .badge-danger {
            color: #fff !important;
        }

        .badge-success {
            color: #fff !important;
        }

        .dataTables_wrapper .buttons-excel {
            background: #fff;
            border: 0px;
        }

        .fa-file-excel {
            color: green !important;
        }

        .btn-secondary:hover {
            background-color: unset;
            border-color: unset;
        }

        div.dt-buttons {
            float: right;
        }

        .btn-secondary:not(:disabled):not(.disabled).active,
        .btn-secondary:not(:disabled):not(.disabled):active,
        .show>.btn-secondary.dropdown-toggle {
            background-color: unset;
            border-color: unset;
        }

        .modal-footer>.btn-secondary {
            background-color: #636363;
            border-color: #636363;
        }

        .paginate_button.page-item.active {
            background-color: #007bff;
            border-color: #007bff;

        }

        .sidebar {
            padding-right: unset;

        }

        .brand-link {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .user-panel {

            border-bottom: 1px solid #dee2e6 !important;
        }

        .small-box>.small-box-footer {
            color: #fff !important;
        }

        .svg-img {
            width: 13px;
        }

        .close.white-bg {
            color: #fff;
            opacity: unset;
        }

        .btn-primary>.fas {
            padding-right: 0px !important;
        }

        .fa,
        .fas {
            padding-right: 10px;
        }

        .form-control {
            border: 1px solid #99a1a9;
        }
    </style>
    <!-- Google Font: Source Sans Pro -->

</head>
