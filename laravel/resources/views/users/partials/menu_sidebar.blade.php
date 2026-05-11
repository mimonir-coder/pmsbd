<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('front/dist/images/Pms.png') }}" alt="PMS BD" style="max-height: 60px;" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('courses') }}">
                        <i class="fas fa-book"></i>Browse Courses</a>
                </li>
                <li class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}">
                        <i class="fas fa-user"></i>My Profile</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
