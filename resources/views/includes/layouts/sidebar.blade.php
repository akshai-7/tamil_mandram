<style>
    [class*="sidebar-dark-"] .sidebar a {
        /* color: #151644; */
        color: black;
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link {
        margin-left: 10px;
    }

    [class*="sidebar-dark-"] .nav-sidebar>.nav-item.menu-open>.nav-link,
    [class*="sidebar-dark-"] .nav-sidebar>.nav-item:hover>.nav-link,
    [class*="sidebar-dark-"] .nav-sidebar>.nav-item>.nav-link:focus {

        background-color: #02468F;
        color: #fff;
        /* background-color: rgba(255, 255, 255, .1);
        color: #38c8ff; */
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link {
        color: #02468F;
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link,
    [class*="sidebar-dark-"] .nav-link>.nav-item:hover>.nav-link,
    [class*="sidebar-dark-"] .nav-link>.nav-item>.nav-link:focus {

        background-color: rgba(255, 255, 255, .1);
        color: #02468F;
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link:hover {
        background-color: rgb(62 217 255 / 24%);
        /* color: #151644; */
        color: black;
        /* background-color: #a1d4f7;
        color: #02468F; */
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link.active:hover {
        background-color: rgb(62 217 255 / 24%);
        color: black;
        /* background-color: #a1d4f7;
        color: #02468F; */
    }


    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link.active {
        background-color: rgb(62 217 255 / 24%);
        color: ;
        /* background-color: #a1d4f7;
        color: #02468F; */
    }


    ::after,
    ::before {

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

    }

    element {}

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link,
    [class*="sidebar-dark-"] .nav-link>.nav-item:hover>.nav-link,
    [class*="sidebar-dark-"] .nav-link>.nav-item>.nav-link:focus {
        background-color: #fff;
        color: black;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #02468F;
        color: #fff;

    }

    .card-header:first-child {
        background: #fff;
        color: #151644;
    }

    .card-title {
        padding: 0px;
    }

    .btn-primary:hover {
        background-color: #BC8B18;
    }

    .sub-menu {
        font-size: 16px;
    }

    p {
        font-size: 17px;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #fff;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link ">
        <img src="{{ asset('/public/image/logo.png') }}" height="50" width="100" style="margin-left: 30px; zoom: 1.5;"
            alt="Image" />

    </a>


    @php
        $fileDecrypt = '';
        if (Auth::user()->u_profile_image && Auth::user()->super_admin) {
            $fileDecrypt = \App\Models\User::getProfileImage(Auth::user()->u_profile_image);
        } else {
            $org = \App\Models\User::OrganizationUser();
            if (@$org->org_logo) {
                $fileDecrypt = \App\Models\User::getProfileImage(@$org->org_logo);
            }
        }
    @endphp


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img @if (@$fileDecrypt) src="{{ $fileDecrypt }}" @else src="{{ asset('/public/assets/dist/img/avatar5.png') }}" @endif
                    class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                <a class="d-block" style="text-transform: capitalize;">{{ Auth::user()->u_first_name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar"  style="background-color: #02468F;  color:black" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- <li class="nav-item">
                    <a href=" {{ url('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt" style="font-size: 15px;"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li> -->

                @if (Auth::user()->user_role == '1')
                    <li class="nav-item d-none">
                        <a href=" {{ url('dashboard') }}" class="nav-link">
                            <i class="fa fa-dashboard"></i>

                            <p> Dashboard</p>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('organization') }}" class="nav-link">
                            <i class="fa fa-building"></i>
                            <p>
                                Organizations
                            </p>
                        </a>
                    </li>
                @else
                    <li class="nav-item d-none">
                        <a href=" {{ url('dashboard') }}" class="nav-link">
                            <i class="fa fa-dashboard"></i>
                            <p>
                                <b>Dashboard</b>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-info"></i>
                            <p>
                                <b>About Us</b>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('by-law.index') }}" class="nav-link ">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p class="sub-menu">By-Laws </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('history') }}" class="nav-link ">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p class="sub-menu">History </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('executive-committee.index') }}" class="nav-link  ">
                            <i class="fa fa-user nav-icon"></i>
                            <p class="sub-menu"><b>Executive Committee </b></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ url('youth-committee') }}" class="nav-link">
                            <i class="fa fa-users"></i>
                            <p> <b>Youth Committee</b></p>
                            <p class="ml-5" style="margin-left: 38px!important;"></p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('event') }}" class="nav-link">
                            <i class="fa fa-calendar"></i>
                            <p>
                                <b> Upcoming Events</b>
                            </p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href=" {{ route('sponsor.index') }}" class="nav-link">
                            <i class="fa fa-star"></i>
                            <p>
                                <b>Sponsors</b>
                            </p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('send-notification.index') }}" class="nav-link">
                            <i class="fas fa-send"></i>
                            <p>
                                <b>Send Notification</b>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                <b> Settings</b>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href=" {{ url('organization-setting') }}" class="nav-link">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>
                                        Mobile App Color
                                    </p>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setting</p>
                                </a>
                            </li>

                            <li class="nav-item d-none">
                                <a href="{{ route('banner.index') }}" class="nav-link ">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Banner</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link ">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p class="sub-menu">Sponsors Category</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('native-language.index') }}" class="nav-link ">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p class="sub-menu">Native Language</p>
                                </a>
                            </li>

                            <li class="nav-item d-none">
                                <a href="{{ route('whatapp') }}" class="nav-link ">
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Whatsapp</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            <i class="fas fa-address-book"></i>
                            <p>
                                <b> Contact Us</b>
                            </p>
                        </a>
                    </li>


                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
