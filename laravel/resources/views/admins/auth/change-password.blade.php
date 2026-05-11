@extends('layouts.back-app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0"><i class="feather icon-lock m-r-10"></i> Change Password</h5>
                </div>

                <div class="card-body">
                    @include('admins.partials.alerts')

                    <p class="text-muted">
                        Logged in as
                        <strong>{{ Auth::guard('admin')->user()->name }}</strong>
                        ({{ Auth::guard('admin')->user()->email }})
                    </p>

                    <form method="POST" action="{{ route('admin.password.update') }}" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input id="current_password"
                                   type="password"
                                   class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                   name="current_password"
                                   autocomplete="current-password"
                                   required>
                            @error('current_password', 'updatePassword')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password"
                                   type="password"
                                   class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                   name="password"
                                   autocomplete="new-password"
                                   required>
                            <small class="form-text text-muted">
                                Use at least 8 characters. Mix letters, numbers and symbols for safety.
                            </small>
                            @error('password', 'updatePassword')
                                <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input id="password_confirmation"
                                   type="password"
                                   class="form-control"
                                   name="password_confirmation"
                                   autocomplete="new-password"
                                   required>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-light mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather icon-save m-r-5"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
