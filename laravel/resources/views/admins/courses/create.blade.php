@extends('layouts.back-app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('admins.partials.alerts')
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>New course</h5>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admins.courses._fields', ['course' => new \App\Models\Course()])
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('java_script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
    <script>
        ['#overview', '#content', '#schedule'].forEach(function(sel) {
            $(sel).summernote({height: 220});
        });
    </script>
@endsection
