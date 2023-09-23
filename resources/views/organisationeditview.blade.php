@extends('app')
@section('content')
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .card-primary:not(.card-outline)>.card-header {
        background-color: #02468F;
    }

    .btn:not(:disabled):not(.disabled) {
        background-color: #02468F;
    }

    a {
        text-decoration: none;
        background-color: #ae949400;
        color: #272424;
        }
    a:hover{
        text-decoration: none;
        background-color: #ae949400;
        color: white;
    }
    .hover:hover{
  text-decoration: none;
color: white;
}
ul{
    list-style: none;
}
.hover{
  text-decoration: none;
color: white;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Users Form</h1> -->



                </div>


                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                        <!-- <li class="breadcrumb-item active">Users</li> -->
                    </ol>
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
                    <!-- jquery validation -->
                    <div class="card container">

                    <div class="table-div">
                        <ul class="usergroup-list clearfix">
                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <h3>Configuration</h3>
                                <div class="usergroup-itembg">
                                    <a class="handpic">

                                    <a class="handpic"  href="{{url('OrganisationEdit')}}" ><img src="{{asset('/public/assets/dist/img/configuration.png')}}"/></a>

                                    </div></li><li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <h3>Admin</h3><div class="usergroup-itembg">

                                            <a class="handpic"  href="{{url('organisationAdmin')}}" ><img src="{{asset('/public/assets/dist/img/admin.png')}}" /></a>
                                        </div></li><li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <h3>User Group</h3><div class="usergroup-itembg">

                                                <a class="handpic"  href="{{url('organisationUserGroup')}}" > <img src="{{asset('/public/assets/dist/img/user-group.png')}}" />
</a>
                                            </div></li></ul></div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection
