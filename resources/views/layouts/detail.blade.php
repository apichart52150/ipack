<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>iPACK - All</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/icon-nc-big.png') }}">

    <!-- Lightbox css -->
    <link href="{{ asset('public/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Plugins css-->
    <link href="{{ asset('public/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />

    <!-- Custom box css -->
    <link href="{{ asset('public/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert-->
    <link href="{{ asset('public/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="{{ asset('public/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('public/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('public/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')

</head>

<body class="center-menu">
    <!-- Navigation Bar-->

    <header id="topnav">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list mt-3 mr-3">
                        @yield('test_time')
                    </li>

                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    {{-- @if($user)
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                            data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('public/assets/images/user.png') }}" alt="user-image"
                                class="rounded-circle">
                            <span class="pro-user-name ml-1">

                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <!-- item-->
                            <a href="{{ route('user_logout') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>
                    @else --}}
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                            href="{{ route('user_login') }}">
                            <span class="pro-user-name ml-1">
                                Login
                            </span>
                        </a>
                    </li>
                    {{-- @endif --}}
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <div class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('public/assets/images/logo-nc-light.png') }}" alt="" height="45">
                            <!-- <span class="logo-lg-text-light">Xeria</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="{{asset('public/assets/images/icob-nc-light.png') }}" alt="" height="45">
                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <div class="topbar-menu">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="{{url('/detail/standard')}}">
                                {{-- <i class="mdi mdi-home"></i> --}}
                                Standard<div class="arrow-down"></div>
                            </a>
                        </li>
                        <li class="has-submenu">
                            <a href="{{url('/detail/premium')}}">
                                {{-- <i class="mdi mdi-home"></i> --}}
                                Premium<div class="arrow-down"></div>
                            </a>
                        </li>

                    </ul>
                    <!-- End navigation menu -->

                    <div class="clearfix"></div>
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>

    </header>
    <!-- End Navigation Bar-->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="py-5">
        <div class="container pt-5">
            @yield('content')
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    2021 iPACKS © New Cambridge
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    {{-- @include('student.profile') --}}

    <!-- Vendor js -->
    <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/peity/jquery.peity.min.js') }}"></script>

    <!-- Modal-Effect -->
    <script src="{{ asset('public/assets/libs/custombox/custombox.min.js') }}"></script>

    <!--form wysiwig-->
    <script src="{{ asset('public/assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <!-- Magnific Popup-->
    <script src="{{ asset('public/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Gallery Init-->
    <script src="{{ asset('public/assets/js/pages/gallery.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('public/assets/js/app.min.js') }}"></script>

    <!-- Plugins Js -->
    <script src="{{ asset('public/assets/libs/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('public/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('public/assets/js/pages/form-advanced.init.js') }}"></script>

    <!-- sweet-alerts -->
    <script src="{{ asset('public/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/sweet-alerts.init.js') }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset('public/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>

    <!-- Sparkline charts -->
    <script src="{{ asset('public/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script>
        $(document).ready(function () {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1]
                    }
                });

                if($("#elm1").length > 0){
                    tinymce.init({
                        selector: "textarea#elm1",
                        theme: "modern",
                        height: 300,
                        menubar: false,
                        plugins: [
                            "wordcount",
                            "textcolor"
                        ],
                        contenteditable: false
                    });
                }
            })
    </script>


    <script>
        $('input[type="text"]').attr({
                'onChange': 'this.value = this.value.toUpperCase()',
                'autocomplete': false,
                'spellcheck': false
            })

            $('#reset').on('click', () => location.reload())

           
            var session_id = "{!! (session('ss_id'))?session('ss_id'):'' !!}";
            var user_id = "{!! (Auth::user())?Auth::user()->session_id:'' !!}";

            if(user_id !== session_id) {
                alert('Your account login from another device!!', 'Warning Alert');
                window.location.href = "{{ route('user_logout')}}";
            } 

            document.oncontextmenu = function() { return false; }
            document.onselectstart = function() { return false; }

    </script>

    @yield('js')

</body>

</html>