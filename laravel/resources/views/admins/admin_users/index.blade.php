@extends('layouts.back-app')

@section('content')
    @include('admins.partials.alerts')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Admin Users</h5>
                    <a href="{{ route('admin.admin-users.create') }}" class="btn btn-primary btn-sm">Add admin user</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $row)
                                    <tr>
                                        <td style="width: 70px;">
                                            <img src="{{ filled($row->image) ? asset('storage/'.$row->image) : asset('assets/images/user/avatar-2.jpg') }}"
                                                 alt="{{ $row->name }}"
                                                 class="rounded"
                                                 style="width: 48px; height: 48px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <div class="font-weight-bold">{{ $row->name }}</div>
                                            @if(Auth::guard('admin')->id() === $row->id)
                                                <span class="badge badge-info">You</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->mobile }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>
                                            <span class="badge badge-{{ $row->status === 'Active' ? 'success' : 'secondary' }}">
                                                {{ $row->status }}
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.admin-users.edit', $row) }}" class="btn btn-info btn-sm">Edit</a>
                                            @if(Auth::guard('admin')->id() !== $row->id)
                                                <form class="d-inline" method="POST" action="{{ route('admin.admin-users.destroy', $row) }}" onsubmit="return confirm('Delete this admin user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">No admin users yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
