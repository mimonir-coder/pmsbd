<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Solutions Bangladesh | @yield('title')</title>
    <meta name="keywords" content="Bangladesh University OF Professionals, BUP" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name='subject' content='' subject=''>
    <meta name="copyright" content="" />
    <meta name="language" content="EN" />
    <meta name="robots" content="index,no-follow" />
    <meta name="abstract" content="" />
    <meta name="topic" content="" />
    <meta name="summary" content="" />
    <meta name="Classification" content="" />
    <meta name="author" content="Md Khalid Hossain" />
    <meta name="og:title" content="@yield('title')" />
    <meta name="og:type" content="" />
    <meta name="og:url" content="" />
    <meta name="og:image" content="" />
    <meta name="og:site_name" content="" />
    <meta name="og:description" content="@yield('meta_description')" />
    <link rel="icon" href="{{ asset('front/dist/images/Pms.png') }}" type="image/gif" sizes="16x16" />


    <!-- ====Css Link==== -->
    <link rel="stylesheet" href="{{ asset('front/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/node_modules/@fortawesome/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('front/dist/fonts/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/node_modules/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/dist/plugins/animate_css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/dist/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/dist/plugins/owl-carousel/owl.theme.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/dist/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/dist/css/custom.css') }}">
</head>

<body>

    @include('pages.partials.header')


    @yield('content')


    @include('pages.partials.footer')




    <div class="cursor"></div>


    <!-- ==== Jquery Link ==== -->
    <script src="{{ asset('front/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('front/node_modules/popper.js/dist/popper.js') }}"></script>
    
    <script src="{{ asset('front/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/dist/plugins/slick-carousel/slick.js') }}"></script>
    <script src="{{ asset('front/node_modules/aos/dist/aos.js') }}"></script>
        
    <script type="text/javascript" src="{{ asset('front/dist/plugins/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('front/dist/js/myjs.js') }}"></script>

    <script>
        AOS.init();
    </script>

    <script type="text/javascript">
        const cursor = document.querySelector('.cursor');

        document.addEventListener('mousemove', e => {
            cursor.setAttribute("style", "top: "+(e.pageY - 10)+"px; left: "+(e.pageX - 10)+"px;")
        })

        document.addEventListener('click', () => {
            cursor.classList.add("expand");

            setTimeout(() => {
                cursor.classList.remove("expand");
            }, 500)
        })
    </script>


</body>

</html>