@extends('layouts.main')

@section('title')
    {{ $course->title }}
@endsection

@section('meta_description')
    {{ \Illuminate\Support\Str::limit(strip_tags($course->overview ?? ''), 160) }}
@endsection

@section('content')
    <section class="page-top-bg mb-5">
        <div class="page-overlay">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="font_six text-white">{{ $course->title }}</h3>
                        @if ($course->sub_title)
                            <p class="font_six text-white mb-2">{{ $course->sub_title }}</p>
                        @endif
                        @if ($course->fee !== null)
                            <p class="font_one text-white mb-0"><strong>Course fee:</strong> {{ number_format((float) $course->fee, 2) }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    @if ($course->youtubeEmbedUrl())
                        <div class="embed-responsive embed-responsive-16by9 rounded-lg mb-4">
                            <iframe class="embed-responsive-item" src="{{ $course->youtubeEmbedUrl() }}" title="Course video"
                                allowfullscreen></iframe>
                        </div>
                    @elseif ($course->featuredImageUrl())
                        <img src="{{ $course->featuredImageUrl() }}" class="img-fluid rounded-lg mb-4" alt="{{ $course->title }}">
                    @endif

                    @if ($course->registration_url)
                        <div class="mb-4">
                            <a href="{{ $course->registration_url }}" class="btn btn_primary btn_md" target="_blank" rel="noopener">Enroll / Register</a>
                        </div>
                    @endif

                    @if ($course->brochureUrl())
                        <div class="mb-4">
                            <a href="{{ $course->brochureUrl() }}" class="btn btn-outline-dark btn_md" download>Download brochure (PDF)</a>
                        </div>
                    @endif

                    <ul class="nav nav-tabs border-0" id="courseTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-overview" data-toggle="tab" data-target="#overview-pane" type="button" role="tab">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-content" data-toggle="tab" data-target="#content-pane" type="button" role="tab">Course content</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-schedule" data-toggle="tab" data-target="#schedule-pane" type="button" role="tab">Schedule</button>
                        </li>
                    </ul>
                    <div class="tab-content border-left border-right border-bottom p-3" id="courseTabContent">
                        <div class="tab-pane fade show active font_one text-justify" id="overview-pane" role="tabpanel">
                            {!! $course->overview ?? '<p>No overview published yet.</p>' !!}
                        </div>
                        <div class="tab-pane fade font_one text-justify" id="content-pane" role="tabpanel">
                            {!! $course->content ?? '<p>No content published yet.</p>' !!}
                        </div>
                        <div class="tab-pane fade font_one text-justify" id="schedule-pane" role="tabpanel">
                            {!! $course->schedule ?? '<p>Schedule coming soon.</p>' !!}
                        </div>
                    </div>

                    @if ($course->instructors->count())
                        <div class="my-5">
                            <h4 class="font_six mb-3">Facilitators</h4>
                            <div class="row">
                                @foreach ($course->instructors as $instructor)
                                    <div class="col-md-6 mb-4">
                                        <div class="media">
                                            @if ($instructor->imageUrl())
                                                <img src="{{ $instructor->imageUrl() }}" alt="{{ $instructor->name }}" class="align-self-start rounded mr-3" style="width: 88px;height:88px;object-fit:cover;">
                                            @endif
                                            <div class="media-body">
                                                <h5 class="font_six mb-1">{{ $instructor->name }}</h5>
                                                @if ($instructor->designation)
                                                    <p class="text-muted small mb-2">{{ $instructor->designation }}</p>
                                                @endif
                                                @if ($instructor->qualifications)
                                                    <p class="font_one small">{{ $instructor->qualifications }}</p>
                                                @endif
                                                @if ($instructor->bio)
                                                    <div class="font_one">{!! $instructor->bio !!}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="border rounded-lg p-3 shadow-sm sticky-top mb-5" style="top:96px;">
                        <h6 class="font_six mb-3">Course summary</h6>
                        <ul class="list-unstyled font_one small mb-4">
                            <li class="mb-2"><strong>Title:</strong> {{ $course->title }}</li>
                            @if ($course->fee !== null)
                                <li class="mb-2"><strong>Fee:</strong> {{ number_format((float) $course->fee, 2) }}</li>
                            @endif
                            <li><a href="{{ route('courses') }}" class="">← Back to all courses</a></li>
                        </ul>

                        @if ($course->registration_url)
                            <a href="{{ $course->registration_url }}" class="btn btn_primary btn_md btn-block" target="_blank" rel="noopener">Enroll / Register</a>
                        @endif
                    </div>
                </div>
            </div>

            @if ($testimonials->count())
                <div class="row my-5">
                    <div class="col-12">
                        <h4 class="font_six text-center mb-4">What delegates say</h4>
                        <div class="row">
                            @foreach ($testimonials as $t)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card border-0 shadow-sm h-100">
                                        @if ($t->imageUrl())
                                            <img src="{{ $t->imageUrl() }}" class="card-img-top" alt="{{ $t->name }}" style="object-fit:cover;max-height:200px;">
                                        @endif
                                        <div class="card-body font_one">
                                            <h5 class="font_six mb-1">{{ $t->name }}</h5>
                                            @if ($t->designation)
                                                <div class="text-muted small mb-2">{{ $t->designation }}</div>
                                            @endif
                                            <div>{!! $t->comments !!}</div>
                                            @if ($t->social_link)
                                                <a href="{{ $t->social_link }}" class="d-inline-block mt-2 small" target="_blank" rel="noopener">Linked profile →</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if ($clients->count())
                <div class="row my-5 pb-5">
                    <div class="col-12 mb-4 text-center">
                        <h4 class="font_six">Valued clients</h4>
                    </div>
                    @foreach ($clients as $client)
                        <div class="col-6 col-md-4 col-lg-3 mb-4 text-center">
                            @if ($client->logoUrl())
                                <img src="{{ $client->logoUrl() }}" alt="{{ $client->name }}" class="img-fluid px-3" style="max-height:64px;">
                            @else
                                <div class="font_one font-weight-bold">{{ $client->name }}</div>
                            @endif
                            <div class="small text-muted mt-2">{{ $client->name }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
