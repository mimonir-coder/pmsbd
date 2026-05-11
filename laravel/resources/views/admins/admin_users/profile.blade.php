@extends('layouts.back-app')

@section('content')
    @include('admins.partials.alerts')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>My Profile</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admins.admin_users._fields', ['profile' => true])

                        <div class="text-right">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-light mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
