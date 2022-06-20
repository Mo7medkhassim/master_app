<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr" class="no-outlines">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ==== Document Title ==== -->
    <title>{{ config('app.name') }}</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/morris.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/jquery-jvectormap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/horizontal-timeline.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/ion.rangeSlider.skinFlat.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_asset/css/sweetalert-overrides.css')}}">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_asset/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_asset/plugins/noty/noty.min.js') }}"></script>

    <style>
        .res_flex {
            align-items: center;
        }

        button {
            cursor: pointer;
        }

        .pageloader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('../dashboard_asset/img/ajax-loader.gif') 50% 50% no-repeat #2BB3C0;
            opacity: 5;
        }
        #search_pro .navbar--search {
            max-width: 768px !important;
        }



        @media (max-width: 600px) {
            .res_flex {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

            .nav-tabs .nav-item {
                width: 100%;
            }

            .m-account--content-w {
                height: 300px
            }
        }
    </style>
    <!-- Page Level Stylesheets -->

</head>

<body>

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Navbar Start -->
        <header class="navbar navbar-fixed">
            <!-- Navbar Header Start -->
            <div class="navbar--header">
                <!-- Logo Start -->
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="">
                </a>
                <!-- Logo End -->

                <!-- Sidebar Toggle Button Start -->
                <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- Sidebar Toggle Button End -->
            </div>
            <!-- Navbar Header End -->

            <!-- Sidebar Toggle Button Start -->
            <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
                <i class="fa fa-bars"></i>
            </a>
            <!-- Sidebar Toggle Button End -->

            <!-- Navbar Search Start -->
            <!-- <div class="navbar--search">
                <form action="search-results.html">
                    <input type="search" name="search" class="form-control" placeholder="Search Something..." required>
                    <button class="btn-link"><i class="fa fa-search"></i></button>
                </form>
            </div> -->
            <!-- Navbar Search End -->

            <div class="navbar--nav ml-auto">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-bell"></i>
                            <span class="badge text-white bg-blue">7</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="mailbox_inbox.html" class="nav-link">
                            <i class="fa fa-envelope"></i>
                            <span class="badge text-white bg-blue">4</span>
                        </a>
                    </li>

                    <!-- Nav Language Start -->
                    <li class="nav-item dropdown nav-language">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="assets/img/flags/us.png" alt="">
                            <span>English</span>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="">
                                    <img src="assets/img/flags/de.png" alt="">
                                    <span>German</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="assets/img/flags/fr.png" alt="">
                                    <span>French</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="assets/img/flags/us.png" alt="">
                                    <span>English</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Nav Language End -->

                    <!-- Nav User Start -->
                    <li class="nav-item dropdown nav--user online">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="assets/img/avatars/01_80x80.png" alt="" class="rounded-circle">
                            <span>{{ Auth() ->  user()->name }} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="profile.html"><i class="far fa-user"></i>Profile</a></li>
                            <li><a href="mailbox_inbox.html"><i class="far fa-envelope"></i>Inbox</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock Screen</a></li>

                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                            </li>

                        </ul>
                    </li>
                    <!-- Nav User End -->
                </ul>
            </div>
        </header>

        <!-- Navbar End -->

        <!-- Sidebar Start -->
        @include('dashboard.layouts.sidebar')

        <!-- Sidebar End -->

        <!-- Main Container Start -->
        <main class="main--container">
            @include('partials._session')

            @yield('content')
            <!-- Main Footer Start -->
            <footer class="main--footer main--footer-light">
                <p>Copyright &copy; <a href="#">DAdmin</a>. All Rights Reserved.</p>
            </footer>
            <!-- Main Footer End -->
        </main>
        <!-- Main Container End -->
    </div>
    <!-- Wrapper End -->

    <!-- Loader End -->
    <div class="pageloader"></div>
    <!-- loader End -->

    <!-- Scripts -->
    <script src="{{asset('dashboard_asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/raphael.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/morris.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/select2.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/jquery-jvectormap-world-mill.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/horizontal-timeline.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/jquery.steps.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/dropzone.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard_asset/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    {{--ckeditor--}}
    <script src="{{ asset('dashboard_asset/plugins/ckeditor/ckeditor.js') }}"></script>




    <script>
        // loader
        $(window).load(function() {
            $(".pageloader").fadeOut("slow");
        });
        // $('.delete').click(function(e) {

        //     var that = $(this);

        //     e.preventDefault();

        //     var n = new Noty({
        //         text: "Confirm delete",
        //         type: "alert",
        //         killer: true,
        //         buttons: [
        //             Noty.button("yes", "btn btn-success mr-2", function() {
        //                 that.closest('form').submit();
        //             }),

        //             Noty.button("no", "btn btn-primary mr-2", function() {
        //                 n.close();
        //             }),
        //         ]

        //     });

        // });
        //end of delete

        // ck editor direction
        CKEDITOR.config.language = "{{ app()->getLocale() }}";
    </script>

    @yield('script')
    <!-- Page Level Scripts -->

</body>

</html>