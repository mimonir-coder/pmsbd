@extends('layouts.back-app')

@section('content')
    @include('admins.partials.alerts')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Valued clients</h5>
                    <a href="{{ route('admin.valued-clients.create') }}" class="btn btn-primary btn-sm">Add client</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Order</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clients as $row)
                                    <tr>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->sort_order }}</td>
                                        <td>{{ $row->is_active ? 'Yes' : 'No' }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.valued-clients.edit', $row) }}" class="btn btn-info btn-sm">Edit</a>
                                            <form class="d-inline" method="POST" action="{{ route('admin.valued-clients.destroy', $row) }}" onsubmit="return confirm('Delete?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">No clients yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
