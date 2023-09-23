<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Clients iOrgapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/public/image/logo.png') }} ">
    <!-- Bootstrap Css -->
    <link href="{{asset('/public/home_assets/css/bootstrap.min.css') }} " id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/public/home_assets/css/icons.min.css') }} " rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/public/home_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<style>
     .auth-pass-inputgroup input[type=password]+.btn .mdi-eye-outline:before {
            content: "\f06d1";
        }

        .auth-pass-inputgroup input[type=input]+.btn .mdi-eye-outline:before {
            content : "\f06d0";
        }
</style>
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
                                <div class="mb-4 d-none">
                                    <img src="{{asset('/public/image/logo.png') }} " alt="" class="auth-logo-dark" style="    vertical-align: middle;width: 180px;height: 69px;margin-top: -18px; margin-left:-40px">
                                </div>
                                <div class="my-auto">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <H1 class="fw-normal mb-3 pb-3">Login</h1>
                                    <div>

                                        <h5 class="text-info" style="color:#02468F;">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue your account.</p>
                                    </div>

                                    <div class="mt-4 col-xl-6">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                 <label for="U_" class="form-label">Username</label>
                                                <input type="text" name="u_user_id" required class="form-control @error('u_user_id') is-invalid @enderror" id="username" value="{{old('u_user_id')}}">
                                                @error('u_user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    <a href="{{route('reset.show')}}" class="text-muted">Forgot password?</a>
                                                </div>
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " required aria-label="Password" aria-describedby="password-addon">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>

                                            <!-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div> -->

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary " style="background:#004890;" type="submit">Log In</button>
                                            </div>
                                        </form>
                                        <!-- <div class="mt-5 ">
                                                <p>Don't have an account ? <a href="#" class="fw-medium text-primary"> Signup now </a> </p>
                                            </div> -->
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 ">
                                    <p class="mb-0">Copyright © 2023 iOrg LLC All rights reserved.</p>
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

</html>
<script>

  $(document).ready(function() {
        
        $(".alert.alert-success").fadeOut(5000);
        $(".alert.alert-danger").fadeOut(5000);
    });
</script>
