<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="dark-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('vendor/backend/') }}" data-template="vertical-menu-template-dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }} - {{ env('APP_NAME') }}</title>

    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="{{ $keywords }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('vendor/backend/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/css/rtl/core-dark.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/css/rtl/theme-default-dark.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/backend/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('vendor/backend/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('vendor/backend/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('vendor/backend/js/config.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts._backend.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts._backend.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('layouts._backend.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('vendor/backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/backend/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/backend/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('vendor/backend/js/main.js') }}"></script>

    <!-- Page JS -->
    @stack('modals')
    @yield('custom-js')
    @livewireScripts
</body>

</html>
