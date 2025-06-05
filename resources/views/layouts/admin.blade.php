<!doctype html>
<html lang="en">

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 17:17:47 GMT -->

<head>
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.css') }}" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Codescandy" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <!-- darkmode js -->
    <script src="{{ asset('assets/js/vendors/darkMode.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dist/dropzone.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="canonical" href="{{ url('admin/dashbord') }}" />
    <title>Dashboard | Motechnova</title>
    @livewireStyles
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        @include('layouts.inc.admin.nav')

        <!-- Page Content -->
        <main id="page-content">
            @include('layouts.inc.admin.header')

            <!-- Page Header -->
            <!-- Container fluid -->
            @yield("content")
        </main>
    </div>

    <!-- Script -->

    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/chart.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/choices.js') }}"></script>
     @yield('script')
    @livewireScripts
</body>

<!-- Mirrored from geeksui.codescandy.com/geeks/pages/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2024 17:17:48 GMT -->

</html>
