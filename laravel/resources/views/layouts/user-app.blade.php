<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('main/css/font-face.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/font-awesome-4.7/css/font-awesome.min.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/font-awesome-5/css/fontawesome-all.min.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/mdi-font/css/material-design-iconic-font.min.css')  }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('main/vendor/bootstrap-4.1/bootstrap.min.css')  }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('main/vendor/animsition/animsition.min.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/wow/animate.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/css-hamburgers/hamburgers.min.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/slick/slick.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/select2/select2.min.css')  }}" rel="stylesheet" media="all">
    <link href="{{ asset('main/vendor/perfect-scrollbar/perfect-scrollbar.css')  }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('main/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('users.partials.header_mobile')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('users.partials.menu_sidebar')
        <!-- END MENU SIDEBAR-->

        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('users.partials.header_desktop')
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @yield('content')
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
    </div>

<!-- Jquery JS-->
<script src="{{ asset('main/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('main/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('main/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('main/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('main/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('main/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('main/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('main/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('main/vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('main/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('main/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('main/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('main/vendor/select2/select2.min.js') }}"></script>
<!-- Main JS-->
<script src="{{ asset('main/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
