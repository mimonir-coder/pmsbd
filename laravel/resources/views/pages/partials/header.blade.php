<!-- ===== Header section start ===== -->
<header class="header shadow-sm">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8">
                    
                </div>
                <div class="col-12 col-sm-4">
                    <div class="top-menu">
                        <p class="text-center text-sm-right">
                            <a href="{{ route('login') }}"> Login </a> | <a href="{{ route('register') }}">Registration</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navigation w-100">
        <div class="nav-new-bg">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <div class="row">
                            <img class="img-fluid" src="{{ asset('front/dist/images/pms_dark_logo.png') }}" alt="logo" />
                        </div>
                    </a>
                    <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse"
                        data-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">

                        <i class="ti-menu text-black"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto text-center">
                            <li class="nav-item">
                                <a href="{{ route('about.us') }}" class="nav-link">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pmi.atp') }}" class="nav-link">
                                    PMI-ATP
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('course.pmp') }}" class="nav-link">
                                    PMP
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('courses') }}" class="nav-link">
                                    Courses
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('blog') }}" class="nav-link">
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact') }}" class="nav-link">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ===== Header section end ===== -->
    