@extends('layouts.main')

@section('title')
    Courses
@endsection

@section('meta_description')
    Training courses offered by Project Management Solutions Bangladesh.
@endsection

@section('content')
    <section class="page-top-bg mb-5">
        <div class="page-overlay">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="font_six text-white">Courses</h3>
                        <p class="font_six text-white mb-0">Browse upcoming programmes and enrol online</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            @if ($courses->count() === 0)
                <div class="alert alert-info mb-4">Courses will appear here shortly. Please check back soon.</div>
            @else
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                @if ($course->featuredImageUrl())
                                    <a href="{{ route('course.show', $course) }}">
                                        <img src="{{ $course->featuredImageUrl() }}" class="card-img-top" alt="{{ $course->title }}">
                                    </a>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="font_six">{{ $course->title }}</h5>
                                    @if ($course->sub_title)
                                        <p class="text-muted small">{{ $course->sub_title }}</p>
                                    @endif
                                    @if ($course->fee !== null)
                                        <p class="font_one mb-3"><strong>Fee:</strong> {{ number_format((float) $course->fee, 2) }}</p>
                                    @endif
                                    <div class="mt-auto">
                                        <a href="{{ route('course.show', $course) }}" class="btn btn_primary btn_sm">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    {{ $courses->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
