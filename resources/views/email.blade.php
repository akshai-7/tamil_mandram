<!doctype html>
<html lang="en">

<head>



    <meta charset="utf-8" />
    <title>iOrg </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Rakta" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/public/home_assets/images/sl.png') }} ">
    <!-- Bootstrap Css -->
    <link href="{{asset('/public/home_assets/css/bootstrap.min.css') }} " id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/public/home_assets/css/icons.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/public/home_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0"> 
            <div class="row g-0">

            <div class="col-xl-7" style="border-right:1px solid #E8E9FF   ;background-color:#E8E9FF  ">

                    <div class="w-100 text-center">
                    <img style="width: 60% !important;" src="{{asset('/public/image/home/left-side.png') }}" alt="" class="hidden-mobile img-fluid  pt-5 ">
                    </div>

                </div>

                <!-- end col -->
                <div class="col-xl-5">

                    <div class="auth-full-page-content p-md-4 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 ">
                                    <!--<img src="{{asset('/public/image/logo.png') }} " alt="" class="auth-logo-dark" style="    vertical-align: middle;width: 180px;height: 69px;margin-top: -18px; margin-left:-40px">-->
                                </div>
                                <div class="my-auto">
                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div>
                                        <h5 class="text-info" style="color:#004890;">Reset Password</h5>
                                    </div>


                                    <div class="mt-4 col-xl-6">
                                        <form method="POST" action="{{ route('forget.password') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="U_" class="form-label">Email</label>
                                                <input type="text" name="u_email" required class="form-control @error('u_email') is-invalid @enderror" id="u_email">
                                                @error('u_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary " style="background:#004890;" type="submit">Send Password Reset Link</button>
                                                <br>
                                                <a class="btn btn-primary " style="background:#004890;" href="{{ url('login') }}">back</a>
                                            </div>
                                        </form>
                                        <!-- <div class="mt-5 ">
                                                <p>Don't have an account ? <a href="#" class="fw-medium text-primary"> Signup now </a> </p>
                                            </div> -->
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 ">
                                    <p class="mb-0">Copyright © 2023 iOrg LLC All rights reserved. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('public/home_assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('public/home_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('public/home_assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{asset('public/home_assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{asset('public/home_assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- App js -->
    <script src="{{asset('public/home_assets/js/app.js') }}"></script>
</body>

<script>
    $(document).ready(function(){
        $(".alert.alert-success").fadeOut(5000);
        $(".alert.alert-danger").fadeOut(5000); 
    });
    </script>

</html>
