@extends('app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Cropper CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
<!-- Cropper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #004890;
    }

    .card-primary:not(.card-outline)>.card-header {
        background-color: #004890;
    }

    .btn:not(:disabled):not(.disabled) {
        background-color: #004890;
    }

    a {
        text-decoration: none;
        /* background-color: #ae949400;
color: white; */
    }

    a:hover {
        text-decoration: none;

    }

    /* .hover:hover{
  text-decoration: none;
color: white;
} */
    /* .hover{
  text-decoration: none;
color: white;
} */

    /*  */



    .page {
        margin: 1em auto;
        max-width: 768px;
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        height: 100%;
    }

    .box {
        padding: 0.5em;
        width: 100%;
        margin: 0.5em;
    }

    .box-2 {
        padding: 0.5em;
        width: calc(100%/2 - 1em);
    }

    .options label,
    .options input {
        width: 4em;
        padding: 0.5em 1em;
    }



    .hide {
        display: none;
    }

    img {
        max-width: 100%;
    }


    .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .form-input {
        width: 350px;
        padding: 20px;
        background: #fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
            3px 3px 7px rgba(94, 104, 121, 0.377);
    }

    .form-input input {
        display: none;

    }


    .form-input img {
        width: 100%;
        display: none;

        margin-bottom: 30px;
    }
</style>

    @php
        $bas64img = "";
        $fileDecrypt = '';
        if (Auth::user()->u_profile_image && Auth::user()->super_admin) {

            $fileDecrypt = \App\Models\User::getProfileImage(Auth::user()->u_profile_image);

            if(Auth::user()->u_profile_image) {
                $bas64img = $data->fileDecrypt(Auth::user()->u_profile_image);
            }



        } else {


            $org = \App\Models\User::OrganizationUser();
            if(@$org->org_logo) {
                $fileDecrypt = \App\Models\User::getProfileImage(@$org->org_logo);
            } else{
                $fileDecrypt ="";
            }
            $org_logo = @$data->organization->org_logo;


            if($org_logo) {
                $bas64img = $data->fileDecrypt(decrypt($org_logo));
            }
        }
        @endphp

<div class="content-wrapper">
    <section class="content">

        <?php if (Session::has('success')) : ?>
            <div class="container" style="margin-top: 15px;">
                <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                </div>
            </div>
        <?php endif; ?>

        <section class="content">
            <?php if (Session::has('error')) : ?>
                <div class="container" style="margin-top: 15px;">
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">

                                    <!-- <img class="profile-user-img img-fluid img-circle" src="http://128.199.119.127/dev-smart-labours/public//assets/dist/img/avatar5.png" alt="User profile picture"> -->
                                    <img class="profile-user-img img-fluid img-circle" @if(@$fileDecrypt) src="{{$fileDecrypt}}" @else src="{{asset('/public/assets/dist/img/avatar5.png')}}" @endif style="height:85px;" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center" style="text-transform: capitalize;">{{ Auth::user()->u_first_name }}</h3>
                                <p class="text-center" style="color: #365fa9;">{{@$data->decrypt_mobile}}</p>
                                <p class="text-center" style="color: #365fa9; text-transform: none;">{{@$data->decrypt_email}}</p>

                                <!-- <p class="text-center">mgh@gmail.com</p> -->





                                <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email Id</b> <a class="float-right">1,322</a>
                  </li>

                  <li class="list-group-item">
                    <b>City</b> <a class="float-right">13,287</a>
                  </li>
                </ul> -->

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">

                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">1. Basic Details</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">2. Settings</a>
                                </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-password" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">2. Reset password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body " style="background-color:#fff">
                                <div class="tab-content" id="custom-tabs-one-home1">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <form id="profile_form" method="POST" action="{{ route('profile.update', encrypt($data->id)) }}" class="tabcontent" enctype="multipart/form-data" accept-charset="utf-8" novalidate="novalidate">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" id="id" name="id" value="{{ encrypt($data->id) }}">
                                            <input type="hidden" id="user_role" name="user_role" value="{{ $data->user_role }}">
                                            <div class="row">
                                                <!-- left column -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Organization Name</label>
                                                        <input type="text" name="u_first_name" value="{{ $data->u_first_name }}" class="form-control" id="u_first_name" placeholder="Enter First Name">
                                                    </div>
                                                </div>

                                                @if(!Auth::user()->super_admin)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Organization code</label>
                                                        <input type="text" name="" value="{{ $data->organization->org_code  }}" class="form-control" id="u_last_name" placeholder="Enter Last Name" disabled>
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email Id</label>
                                                        <input type="text" name="u_email" value="{{ $data->decrypt_email }}" class="form-control" id="u_email" placeholder="Enter Email Id">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Image Upload</label>
                                                        <div class="input-group">
                                                            <input name="image" id="file-input" accept="image/jpg,image/jpeg,image/png" class="" type="file" data-error="#errNm1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <img class="cropped lg preview-img no-broder" data-toggle="modal" data-target="#getCroppedCanvasModal" @if($bas64img) src="data:image/png;base64,{!! @$bas64img!!}" @else src="{{asset('/public/assets/dist/img/avatar5.png')}}" @endif alt="" />
                                                    <!-- <img class="cropped lg preview-img no-broder" data-toggle="modal" data-target="#getCroppedCanvasModal" src="http://128.199.119.127/dev-smart-labours/public//assets/dist/img/avatar5.png" alt="" /> -->
                                                    <input type="hidden" name="image_src" value="" class="hidden-preview-img">
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label">Phone Number</label>
                                                        <div class="input-group mb-3">

                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">+971</span>
                                                            </div>
                                                            <input type="number" class="form-control" value="{{$data->decrypt_mobile}}" id="u_mobile_no" name="u_mobile_no" placeholder="Phone number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Gender</label>
                                                        <select class="form-control" name="u_gender" id="u_gender" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                                            <option value="">Select Gender</option>
                                                            @foreach ($genders as $gender)
                                                            <option value="{{$gender->id}}" {{ $data->u_gender == $gender->id ? 'selected' : '' }}>{{$gender->gender_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Address</label>
                                                        <textarea class="form-control" id="u_address" name="u_address" rows="3" placeholder="Enter Address">{{$data->u_address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" value="" class="btn btn-primary pull-right">Submit</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade show" id="custom-tabs-password" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <form id="reset_password" class="tabcontent" accept-charset="utf-8" novalidate="novalidate" style="display: block;">
                                            @csrf

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" style=" color: #787878;">New Password</label>
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" style=" color: #787878;">Confirm Password</label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter Confirm Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <button type="submit" class="btn btn-primary mt-4 " style="margin-top: 31px !important;">Reset Password</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <main class="page">

                <div class="box">

                </div>
                <!-- leftbox -->

                <!--rightbox-->

                <!-- input file -->

            </main>
            <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
</div>
@php
$img = "data:image/png;base64,".$fileDecrypt;
@endphp

@include('common.file-upload',compact('img'))
@endsection

@push('child-scripts')
<script>
    $(document).ready(function() {

        $('#u_nationality').on('change', function() {
            var nationality_id = this.value;
            $("#u_country").html('');
            $.ajax({
                url: "{{url('get-countries')}}",
                type: "POST",
                data: {
                    nationality_id: nationality_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    $('#u_country').html('<option value="">Select Country</option>');
                    $.each(result.countries, function(key, value) {
                        // console.log(value);
                        $("#u_country").append('<option value="' + value.id + '">' + value.country_name + '</option>');
                    });
                    $('#u_state').html('<option value="">Select Country First</option>');
                }
            });
        });


        $('#u_country').on('change', function() {
            var country_id = this.value;
            $("#u_state").html('');
            $.ajax({
                url: "{{url('get-states')}}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    $('#u_state').html(
                        '<option value="">Select State</option>'

                    );

                    $.each(result.states, function(key, value) {
                        // console.log(value);
                        $("#u_state").append('<option value="' + value.id + '">' + value.state_name + '</option>');
                    });
                    $('#u_city').html('<option value="">Select State First</option>');
                }
            });
        });


        $('#u_state').on('change', function() {
            var state_id = this.value;
            $("#u_city").html('');

            $.ajax({
                url: "{{url('get-cities')}}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#u_city').html('<option value="">Select City</option>');
                    $.each(result.cities, function(key, value) {
                        $("#u_city").append('<option value="' + value.id + '">' + value.city_name + '</option>');
                    });
                }
            });
        });

        $(function() {

            $('#reset_password').on('submit', function(e) {
                e.preventDefault();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ url('password-reset') }}",
                    data: {
                        password: password,
                        password_confirmation: password_confirmation,
                        _token: '{{csrf_token()}}',
                        id: $("#id").val()
                    },
                    cache: false,
                    success: function(response) {

                        if (response.status === true) {
                            $('#reset_password')[0].reset();
                        }
                        alert(response.msg);
                    }
                })
            })

            $('#reset_password').validate({
                rules: {
                    password: {
                        required: true,
                        maxlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    password: {
                        required: "Please enter password",
                        maxlength: "Must be 8 characters only allowed!"
                    },
                    password_confirmation: {
                        required: "Please enter confirm password",
                        equalTo: "Password confirm password is mismatched"
                    },


                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    },
                    terms: "Please accept our terms"
                },

                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
            return element.files ? !element.files[0] || (element.files[0].size <= limit) : true;
        }, 'File is too big.Please upload below 2MB Image file.');


        $('#profile_form').validate({

            rules: {
                image: {
                    accept: "image/jpg,image/jpeg,image/png",
                    fileSizeLimit: "2097152"
                    // required: true,
                },
                u_first_name: {
                    required: true,
                    maxlength: 30,
                    // lettersonly: true,
                },
                u_last_name: {
                    required: true,
                    maxlength: 30,
                    // lettersonly: true,
                },
                u_email: {
                    required: true,
                    email: true,
                    maxlength: 100,
                    remote: {
                        url: "{{ route('check-email') }}",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#u_email").val();
                            },
                            _token: "{{ csrf_token() }}",
                            id: $("#id").val()
                        }
                    },
                },
                u_mobile_no: {
                    required: true,
                    number: true,
                    min:1,
                    maxlength: 10,
                    remote: {
                        url: "{{ route('check-mobile-no') }}",
                        type: "post",
                        data: {
                            mobile_no: function() {
                                return $("#u_mobile_no").val();
                            },
                            _token: "{{ csrf_token() }}",
                            id: $("#id").val()
                        }
                    },
                },
                u_gender: {
                    required: true,
                },
                u_nationality: {
                    required: true,
                },
                u_country: {
                    required: true,
                },
                u_state: {
                    required: true,
                },
                u_city: {
                    required: true,
                },
                u_address: {
                    required: true,
                    maxlength: 500,
                },
            },
            messages: {
                u_first_name: {
                    required: "Please enter first name",
                    lettersonly: "Letters and numbers only allowed",
                },
                u_last_name: {
                    required: "Please enter last name",
                    lettersonly: "Letters and numbers only allowed",
                },
                u_email: {
                    required: "Please enter email id",
                    remote: "Email Already exists..!",
                    email: "Please enter valid email id !"
                },
                u_mobile_no: {
                    required: "Please enter phone number",
                    number: "Numbers only allowed",
                    remote: "Mobile No Already exists..!",
                    maxlength: "Must be 10 characters only allowed!"
                },
                u_gender: {
                    required: "Please select gender"
                },
                u_nationality: {
                    required: "Please select nationality"
                },
                u_country: {
                    required: "Please select country"
                },
                u_state: {
                    required: "Please select state"
                },
                u_city: {
                    required: "Please select city"
                },
                u_address: {
                    required: "Please enter address",
                },
                image: {
                    // required: "Please select user photo",
                    accept: "jpg ,jpeg ,png formate only allowed",
                },


                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                terms: "Please accept our terms"
            },

            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    })
</script>

@endpush
