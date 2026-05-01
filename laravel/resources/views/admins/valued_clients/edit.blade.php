@extends('layouts.back-app')

@section('content')
    @include('admins.partials.alerts')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Edit client</h5>
                    <a href="{{ route('admin.valued-clients.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.valued-clients.update', $client) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admins.valued_clients._fields')
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
