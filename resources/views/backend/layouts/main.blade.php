
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="light" data-body-image="img-1" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | PIMS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    {{-- App favicon  --}}
    <link rel="shortcut icon" href="{{ url('admin/assets/images/favicon.ico') }}">

    @stack('extra_css')

    {{-- Layout config Js  --}}
    <script src="{{ url('admin/assets/js/layout.js') }}"></script>
    {{-- Bootstrap Css  --}}
    <link href="{{ url('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- Icons Css  --}}
    <link href="{{ url('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- App Css --}}
    <link href="{{ url('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- custom Css --}}
    <link href="{{ url('admin/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('backend.partials.header')

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{ url('') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('admin/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('admin/assets/images/logo-dark.png') }}" alt="" height="25">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{ url('') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('admin/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('admin/assets/images/logo-light.png') }}" alt="" height="25">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                {{-- Sidebar  --}}
                @include('backend.partials.sidebar')
                {{-- Sidebar  --}}
            </div>

            <div class="sidebar-background"></div>
        </div>
        {{-- Left Sidebar End  --}} 
        {{--  Vertical Overlay --}}
        <div class="vertical-overlay"></div>

        {{--  Start right Content here --}}
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    {{-- start page title --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                                <h4 class="mb-sm-0">@yield('title')</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('backend.partials.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    {{-- start back-to-top --}}
    <button onclick="topFunction()" class="btn btn-primary btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    {{-- end back-to-top --}}

    {{-- preloader --}}
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-primary btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    {{--  Theme Settings  --}}
    @include('backend.partials.theme-settings')

    {{-- JAVASCRIPT --}}
    <script src="{{ url('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('admin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('admin/assets/js/plugins.js') }}"></script>

    @stack('extra_js')

    {{--  App js  --}}
    <script src="{{ url('admin/assets/js/app.js') }}"></script>
</body>
</html>