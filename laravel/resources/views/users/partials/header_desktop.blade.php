<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div>
                    <a href="{{ route('courses') }}" class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-graduation-cap"></i>Browse Courses
                    </a>
                </div>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('main/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ asset('main/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('profile.edit') }}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('courses') }}">
                                            <i class="zmdi zmdi-graduation-cap"></i>Courses</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">

                                    <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('user-logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout
                                    </a>

                                    <form id="user-logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
