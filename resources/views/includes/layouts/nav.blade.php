<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .ahover:hover {
    background-color: white;
  }
</style>


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <!-- <a href="#" class="nav-link">Home</a> -->
    </li>

  </ul>

        @php
        $fileDecrypt = '';
        if (Auth::user()->u_profile_image && Auth::user()->super_admin) {
            $fileDecrypt = \App\Models\User::getProfileImage(Auth::user()->u_profile_image);
        } else {
            $org = \App\Models\User::OrganizationUser();
            if(@$org->org_logo) {
                $fileDecrypt = \App\Models\User::getProfileImage(@$org->org_logo);
            } else{
                $fileDecrypt ="";
            }
        }
        @endphp

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" style="padding: 8px;">
      <img  @if(@$fileDecrypt) src="{{$fileDecrypt}}" @else src="{{asset('/public/assets/dist/img/avatar5.png')}}" @endif   width="30px" height="27px;" class="img-circle elevation-2" alt="User Image">

      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item" style="    padding: 18px 110px;">
          <!-- <img src=" {{asset('/public/assets/dist/img/avatar5.png')}}" style="width: 59px; text-align: revert-layer; position: relative; right: 3px;" class="img-circle elevation-2" alt="User Image"> -->
          <img  @if(@$fileDecrypt) src="{{$fileDecrypt}}" @else src="{{asset('/public/assets/dist/img/avatar5.png')}}" @endif    style="width: 59px; text-align: revert-layer; position: relative; right: 3px;" class="img-circle elevation-2" alt="User Image">
        </a>
        <p style="text-align: center;">{{ Auth::user()->u_name}}</p>
        <div class="dropdown-divider"></div>
        <div class="dropdown-divider"></div>
        <div class="dropdown-divider"></div>
        <div style="display: flex;padding: 8px;">
           <a class ="btn btn-pimary btn-success" href="{{ URL::route('profile.index')}}">Profile</a>
          <a class ="btn btn-pimary btn-danger pull-right" style ="margin-left: 113px !important;" href="{{ URL::route('logout') }}" class="dropdown-item dropdown-footer ahover">
            <i class="ace-icon fa fa-power-off logout" style="font-size: 13px;float: inline-end; "> Logout</i>
          </a>
        </div>
      </div>
    </li>
  </ul>
</nav>
