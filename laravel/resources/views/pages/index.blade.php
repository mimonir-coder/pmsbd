@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')

    <!-- ===== slider section start ===== -->
    <section>
        <div id="carouselExampleIndicators" class="carousel slide new-carousel" data-ride="carousel">
            <div class="d-none d-sm-block">
                <ol class="carousel-indicators ">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                        <img src="{{ asset('front/dist/images/img_one.png') }}" class="d-block w-100" alt="Slider One">
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">
                        <img src="{{ asset('front/dist/images/img_four.png') }}" class="d-block w-100" alt="Slider One">
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2">
                        <img src="{{ asset('front/dist/images/img_six.png') }}" class="d-block w-100" alt="Slider One">
                    </li>
                </ol>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('front/dist/images/sliders/sliderone.png') }}" class="d-block w-100" alt="Slider One">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front/dist/images/sliders/slidertwo.png') }}" class="d-block w-100" alt="Slider Two">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front/dist/images/sliders/sliderthree.png') }}" class="d-block w-100" alt="Slider Three">
                </div>
            </div>
        </div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 py-4">
                        <div class="my-top-slider">
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                                <i class="ti-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                                <i class="ti-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== slider section end ===== -->

    <!-- ===== About section start ===== -->
{{--
    <section class="home-about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="about-text-container">
                        <h3>PMI Approved ATP</h3>
                        <p>
                            <span>AUTHORIZED TRAINING PARTNER (ATP) </span>
                        </p>
                        <p class="text-justify my-4">
                            Training with an Authorized Partner is the only way to ensure you are learning from a PMI-vetted instructor. ” 9 out of 10 students want PMI-approved Instructors for PMP training “ – as per survey conducted by (PMI)®. PMSBD is the (PMI)® Approved Training Partner. All our Instructors are PMI-approved and PMI-vetted Instructors.
                        </p>
                        <a class="btn btn-primary my-btn float-right" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mt-5">
                    <img class="img-responsive d-block mt-5 mx-auto" src="{{ asset('front/dist/images/pmi_atp.jpeg') }}" alt="" style="max-height: 350px;">
                </div>
            </div>
        </div>
    </section>
    <!-- ===== About section end ===== -->
--}}

{{--
    <section class="home-feature">
        <div class="feature-bg">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-12 col-sm-4">
                        <div class="feature-content">
                            <div class="icon">
                                <!-- <i class="fa-regular fa-rectangle-list"></i> -->
                                <i class="fa-solid fa-list-ul"></i>
                            </div>
                            <h3>PMI LICENSED COURSEWARE</h3>
                            <p>                                
                                Training with an Authorized Partner is the only way to ensure you are learning “PMI-developed” PMP® exam prep material.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="feature-content">
                            <div class="icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <h3>PMI-VETTED INSTRUCTORS</h3>
                            <p>                                
                                Training with an Authorized Partner is the only way to ensure you are learning from a PMI-vetted instructor.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="feature-content">
                            <div class="icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <h3>REAL EXAM QUESTIONS</h3>
                            <p>                                
                                We have received 400+ cloned PMP Exam Questions from PMI taken from the real exam and are giving them to you with this course.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

--}}
    <!-- ===== On campus section start ===== -->
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="title-main text-center my-1">Our Courses</h3>
                    <p class="main-sub-title text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, tenetur.</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div id="news-slider5" class="owl-carousel">
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_two.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
         
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_three.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
                        
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_four.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
                        
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_five.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_six.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_seven.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
                        <div class="post-slide5">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/img_one.png') }}">
                                
                            </div>
                            <div class="post-review">
                                <h3 class="post-title"><a href="#">PMP certification Courses</a></h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== On campus section end ===== -->


    <!-- =====  News section start ===== -->
    <section>
        <div class="new-bg mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="title-main text-center my-5">Testimonial</h3>
                    </div>
                </div>
                <div class="row">
                    <div id="myCarousel" class="myCarousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>   
                        <div class="carousel-inner">        
                            <div class="carousel-item active">
                                <div class="img-box"><img src="{{ asset('front/dist/images/1292.jpg') }}" alt=""></div>
                                <p class="testimonial">Phasellus vitae suscipit justo. Mauris pharetra feugiat ante id lacinia. Etiam faucibus mauris id tempor egestas. Duis luctus turpis at accumsan tincidunt. Phasellus risus risus, volutpat vel tellus ac, tincidunt fringilla massa. Etiam hendrerit dolor eget rutrum.</p>
                                <p class="overview"><b>Michael Holz</b>Seo Analyst at <a href="#">OsCorp Tech.</a></p>
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-box"><img src="{{ asset('front/dist/images/13245.jpg') }}" alt=""></div>
                                <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Vestibulum idac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                                <p class="overview"><b>Paula Wilson</b>Media Analyst at <a href="#">SkyNet Inc.</a></p>
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="img-box"><img src="{{ asset('front/dist/images/13251.jpg') }}" alt=""></div>
                                <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio. Phasellus auctor velit.</p>
                                <p class="overview"><b>Antonio Moreno</b>Web Developer at <a href="#">Circle Ltd.</a></p>
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>      
                        </div>
                        <!-- Carousel controls -->
                        <!-- <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== News section end ===== -->


    <!-- ===== Event section start ===== -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title-main text-center my-5">Upcoming Events</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider8" class="owl-carousel">
                        <div class="post-slide8">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/cor01.jpg') }}">
                                <div class="post-date">
                                    <span class="month text-center"> 02 <br> Mar,22</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Latest News Post</a>
                                </h3>
                                <p class="post-description">
                                    <span><i class="ti-alarm-clock"></i></span> 09:30 AM - 05:00 PM <br> 
                                    <span><i class="ti-location-pin"></i></span> Bijoy Auditorium
                                </p>
                            </div>
                        </div>
                        <div class="post-slide8">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/cor02.jpg') }}">
                                <div class="post-date">
                                    <span class="month text-center"> 02 <br> Mar, 22</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eligendi debitis, ratione pariatur qui aliquam.</a>
                                </h3>
                                <p class="post-description">
                                    <span><i class="ti-alarm-clock"></i></span> 09:30 AM - 05:00 PM <br> 
                                    <span><i class="ti-location-pin"></i></span> Bijoy Auditorium
                                </p>
                            </div>
                        </div>
                        <div class="post-slide8">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/cor03.jpg') }}">
                                <div class="post-date">
                                    <span class="month text-center"> 02 <br> Mar, 22</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Latest News Post</a>
                                </h3>
                                <p class="post-description">
                                    <span><i class="ti-alarm-clock"></i></span> 09:30 AM - 05:00 PM <br> 
                                    <span><i class="ti-location-pin"></i></span> Bijoy Auditorium
                                </p>
                            </div>
                        </div>
                        <div class="post-slide8">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/cor04.jpg') }}">
                                <div class="post-date">
                                    <span class="month text-center"> 02 <br> Mar, 22</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Latest News Post</a>
                                </h3>
                                <p class="post-description">
                                    <span><i class="ti-alarm-clock"></i></span> 09:30 AM - 05:00 PM <br> 
                                    <span><i class="ti-location-pin"></i></span> Bijoy Auditorium
                                </p>
                            </div>
                        </div>
                        <div class="post-slide8">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/cor05.jpg') }}">
                                <div class="post-date">
                                    <span class="month text-center"> 02 <br> Mar, 22</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Latest News Post</a>
                                </h3>
                                <p class="post-description">
                                    <span><i class="ti-alarm-clock"></i></span> 09:30 AM - 05:00 PM <br> 
                                    <span><i class="ti-location-pin"></i></span> Bijoy Auditorium
                                </p>
                            </div>
                        </div>
                        <div class="post-slide8">
                            <div class="post-img">
                                <img class="pic-1" src="{{ asset('front/dist/images/cor06.jpg') }}">
                                <div class="post-date">
                                    <span class="month text-center"> 02 <br> Mar, 22</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#">Latest News Post</a>
                                </h3>
                                <p class="post-description">
                                    <span><i class="ti-alarm-clock"></i></span> 09:30 AM - 05:00 PM <br> 
                                    <span><i class="ti-location-pin"></i></span> Bijoy Auditorium
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Event section end ===== -->

    <!-- ===== Affiliations section start ===== -->
    <section class="mb-5">
        <div class="container-fluid bg-color-two p-2" style="margin-top: 150px;">
            <div class="row">
                <div class="col-12"></div>
            </div>
        </div>
        <div class="container" style="margin-top: -100px;">
            <div class="row">
                <div class="col-12" style="background-color: #e9e9e9;border-radius: 15px; padding: 25px 0;">
                    <section class="customer-logos slider">
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/a2inewlogooct.png') }}">
                            <p>Bangladesh A2I</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/arced.png') }}">
                            <p>Army Medical College Chattogram</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/briedg.png') }}">
                            <p>Armed Forces Medical College</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/logo_1.png') }}">
                            <p>Army Medical College Jashore</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/logo_2.png') }}">
                            <p>National Defence Academy </p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/titas.png') }}">
                            <p>Rangpur Army Medical College</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/vas.png') }}">
                            <p>Vastch, Dhaka</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/download.png') }}">
                            <p>Armed Forces Medical College</p>
                        </div>
                        <div class="slide">
                            <img src="{{ asset('front/dist/images/logos/logo_1.png') }}">
                            <p>National Defence Academy </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Affiliations section end ===== -->
@endsection