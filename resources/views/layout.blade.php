<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Cotizar Show</title>

    {{-- <!-- Favicon -->
    <link rel="icon" href="/proyect-form/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="/proyect-form/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/proyect-form/vendor/select2/dist/css/select2.min.css">
    --}}

    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/proyect-form/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="/proyect-form/css/argon.min.css" type="text/css">
    <link rel="stylesheet" href="/css/app.css">

</head>

<body>
<!-- Sidenav -->
{{--<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="/proyect-form/pages/dashboards/dashboard.html">
                <img src="/proyect-form/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>--}}
<!-- Main content -->
<div class="main-content pt-5" id="panel">
    <div class="container-fluid" id="app">
        @yield('content')
    </div>
</div>
{{--
<!-- Argon Scripts -->
<!-- Core -->
<script src="/proyect-form/vendor/jquery/dist/jquery.min.js"></script>
<script src="/proyect-form/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/proyect-form/vendor/select2/dist/js/select2.min.js"></script>
<script src="/proyect-form/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/proyect-form/vendor/js-cookie/js.cookie.js"></script>
<script src="/proyect-form/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="/proyect-form/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="/proyect-form/vendor/chart.js/dist/Chart.min.js"></script>
<script src="/proyect-form/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="/proyect-form/js/argon.js?v=1.1.0"></script>
<!-- Demo JS - remove this in your project -->
<script src="/proyect-form/js/demo.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>



<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
</script>
--}}


<script src="/js/app.js"></script>
@stack('js')
</body>

</html>
