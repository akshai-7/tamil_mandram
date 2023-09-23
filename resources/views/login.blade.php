
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Smart Labour </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Smart Labour" name="description" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/sl.png">



        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-6" style="border-right:1px solid #ebebeb ;">

                            <div class="w-100 text-center">

                               <img src="assets/images/login/slbg.png" alt="" class="hidden-mobile" style="margin-top:30%">
                            </div>

                    </div>
                    <!-- end col -->

                    <div class="col-xl-6">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                            <img src="assets/images/sl.svg" alt="" height="40" class="auth-logo-dark">
                                        <img src="assets/images/logo-light.png" alt="" height="18" class="auth-logo-light">
                                    </div>
                                    <div class="my-auto">
                                        <div>
                                            <h5 class="text-info">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to Smart Labour.</p>
                                        </div>

                                        <div class="mt-4 col-xl-6">
                                            <form  method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="username">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </form>
                                            <div class="mt-5 ">
                                                <p>Don't have an account ? <a href="auth-register-2.html" class="fw-medium text-primary"> Signup now </a> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-md-5 ">
                                        <p class="mb-0">© Smart Labour. 2023 </p>
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
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>

