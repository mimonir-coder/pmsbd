	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar">
		<div class="navbar-wrapper ">
			<div class="navbar-content scroll-div">
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="User-Profile-Image">
						<div class="user-details">
							<span>{{ Auth::guard('admin')->user()->name }}</span>
							{{-- <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div> --}}
						</div>
					</div>
					{{-- <div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="#"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="#"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div> --}}
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('admin.dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Website CMS</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('admin.courses.index') }}">Courses</a></li>
					        <li><a href="{{ route('admin.instructors.index') }}">Instructors</a></li>
					        <li><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
					        <li><a href="{{ route('admin.valued-clients.index') }}">Valued clients</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Admin User Setup</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="#">Sliders</a></li>
					        <li><a href="#">Horizontal</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Application User Setup</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="#">Application Admin User</a></li>
					        <li><a href="#">Application Users</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>UI Element</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Radio Station Setup</span></a>
						<ul class="pcoded-submenu">
							<li><a href="#">Fiscal Year Setup</a></li>
							<li><a href="#">Station Setup</a></li>
							<li><a href="#">Artists Subject Setup</a></li>
							<li><a href="#">Station Programs</a></li>
							<li><a href="#">Station Activities</a></li>
							<li><a href="#">Station Budgets</a></li>
							
							{{-- <li><a href="#">Cards</a></li>
							<li><a href="#">Collapse</a></li>
							<li><a href="#">Carousel</a></li>
							<li><a href="bc_grid.html">Grid system</a></li>
							<li><a href="bc_progress.html">Progress</a></li>
							<li><a href="bc_modal.html">Modal</a></li>
							<li><a href="bc_spinner.html">Spinner</a></li>
							<li><a href="bc_tabs.html">Tabs & pills</a></li>
							<li><a href="bc_typography.html">Typography</a></li>
							<li><a href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
							<li><a href="bc_toasts.html">Toasts</a></li>
							<li><a href="bc_extra.html">Other</a></li> --}}
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Stock &amp; Purches</label>
					</li>
					<li class="nav-item">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Stock Setup</span></a>
					</li>
					<li class="nav-item">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Orders Setup</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Chart & Maps</label>
					</li>
					<li class="nav-item">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
					</li>
					<li class="nav-item">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Pages</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="auth-signup.html" target="_blank">Sign up</a></li>
					        <li><a href="auth-signin.html" target="_blank">Sign in</a></li>
					    </ul>
					</li>
					<li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->