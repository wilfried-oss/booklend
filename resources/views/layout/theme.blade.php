<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }} ">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }} " />

    <!-- inject select2 css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}">
    <!-- inject:css -->

    <title>Booklend | @yield('title')</title>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('assets/images/logo.svg') }} "
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img
                        src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0"
                                placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('assets/images/faces/face1.jpg') }} " alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ $user->username }} </p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached mr-2 text-success"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout.perform') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i>
                                    Signout
                                </button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-format-line-spacing"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('assets/images/faces/face1.jpg') }} " alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ $user->username }}</span>
                                <span class="text-secondary text-small">Project Manager</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }} ">
                            <span class="menu-title">Main Pannel</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('author.index') }}">
                            <span class="menu-title">Author</span>
                            <i class="mdi mdi-air-conditioner  menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('book.index') }}">
                            <span class="menu-title">Book</span>
                            <i class="mdi mdi-arrow-all  menu-icon"></i>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.index') }}">
                            <span class="menu-title">Student</span>
                            <i class="mdi mdi-audiobook  menu-icon"></i>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lend.index') }}">
                            <span class="menu-title">Lend</span>
                            <i class=" mdi mdi-basket-fill  menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                @yield('content')

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- partial -->
        </div>
        <!-- partial -->

        <!-- plugins:js -->
        <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{ asset('assets/js/off-canvas.js') }} "></script>
        <script src="{{ asset('assets/js/misc.js') }} "></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('assets/js/dashboard.js') }} "></script>
        <!-- End custom js for this page-->

        <!-- inject:js:jquery -->
        <script src="{{ asset('assets/vendors/jquery/jquery-3.5.1.min.js') }}"></script>

        <!-- inject:js:select2 -->
        <script src="{{ asset('assets/vendors/select2/js/select2.min.js') }}"></script>

        @yield('script')
</body>

</html>
