<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SiMA</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('public/Template') }}/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ url('public/Template') }}/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <x-layout.admin.sidebar />
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <x-layout.admin.header />
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                {{ $slot }}
            </div>
        </div>
        {{-- <footer class=" border-top py-3 bg-light text-muted">
            <div class="d-flex justify-content-around align-items-center">
                <small>
                    Version 1.1.0 (Build Ver : 150425.20) © 2024 - <span id="year"></span> POLITAP. All rights
                    reserved.
                </small>
                <small>
                    <a href="#" class="text-decoration-none text-primary">SiSMA Team Project</a>
                </small>
            </div>
        </footer> --}}
    </div>
    <script src="{{ url('public/Template') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('public/Template') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public/Template') }}/assets/js/sidebarmenu.js"></script>
    <script src="{{ url('public/Template') }}/assets/js/app.min.js"></script>
    <script src="{{ url('public/Template') }}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ url('public/Template') }}/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="{{ url('public/Template') }}/assets/js/dashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("year").textContent = new Date().getFullYear();
        })
    </script>
</body>

</html>
