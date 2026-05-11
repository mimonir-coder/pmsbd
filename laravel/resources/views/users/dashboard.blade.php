@extends('layouts.user-app')

@section('title')
    Student Dashboard
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Student Dashboard</h2>
                    <a href="{{ route('courses') }}" class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-graduation-cap"></i>browse courses
                    </a>
                </div>
            </div>
        </div>

        <div class="row m-t-25">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3">Welcome, {{ Auth::user()->name }}</h3>
                        <p class="text-muted mb-4">
                            This account is for course browsing, registration and learning updates.
                            Admin/CMS features are not available from student login.
                        </p>
                        <a href="{{ route('courses') }}" class="btn btn-primary mr-2">View available courses</a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Update profile</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-book"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $courses->count() }}</h2>
                                <span>available courses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Available Courses</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($courses as $course)
                                <div class="col-md-6 col-xl-4 mb-4">
                                    <div class="card h-100">
                                        @if($course->featured_image)
                                            <img src="{{ asset('storage/'.$course->featured_image) }}" class="card-img-top" alt="{{ $course->title }}" style="height: 160px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $course->title }}</h5>
                                            @if($course->sub_title)
                                                <p class="card-text text-muted">{{ $course->sub_title }}</p>
                                            @endif
                                            @if($course->fee !== null)
                                                <p class="font-weight-bold mb-3">Fee: {{ number_format((float) $course->fee, 2) }}</p>
                                            @endif
                                            <a href="{{ route('course.show', $course) }}" class="btn btn-sm btn-primary">Details / Register</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted mb-0">No courses are available right now.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
