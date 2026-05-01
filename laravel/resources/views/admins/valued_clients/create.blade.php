@extends('layouts.back-app')

@section('content')
    @include('admins.partials.alerts')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>New client</h5>
                    <a href="{{ route('admin.valued-clients.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.valued-clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admins.valued_clients._fields', ['client' => new \App\Models\ValuedClient()])
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
