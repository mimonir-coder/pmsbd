@extends('layouts.back-app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('admins.partials.alerts')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Edit instructor</h5>
                    <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.instructors.update', $instructor) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admins.instructors._fields', ['instructor' => $instructor])
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('java_script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
    <script>
        $('#bio').summernote({height: 220});
    </script>
@endsection
