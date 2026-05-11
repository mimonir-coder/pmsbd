<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{ asset('front/dist/images/Pms.png') }}" alt="PMS BD" style="max-height: 50px;" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('courses') }}">
                        <i class="fas fa-book"></i>Browse Courses</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}">
                        <i class="fas fa-user"></i>My Profile</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
