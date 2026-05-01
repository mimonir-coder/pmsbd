@extends('layouts.back-app')

@section('content')
    @include('admins.partials.alerts')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Courses</h5>
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">Add course</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Fee</th>
                                    <th>Instructors</th>
                                    <th>Order</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $row)
                                    <tr>
                                        <td>
                                            <div class="font-weight-bold">{{ $row->title }}</div>
                                            <div class="text-muted small">{{ $row->slug }}</div>
                                            <a href="{{ route('course.show', $row) }}" target="_blank">View live</a>
                                        </td>
                                        <td>{{ $row->fee !== null ? number_format((float) $row->fee, 2) : '—' }}</td>
                                        <td>{{ $row->instructors->pluck('name')->join(', ') ?: '—' }}</td>
                                        <td>{{ $row->sort_order }}</td>
                                        <td>{{ $row->is_active ? 'Yes' : 'No' }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.courses.edit', $row) }}" class="btn btn-info btn-sm">Edit</a>
                                            <form class="d-inline" method="POST" action="{{ route('admin.courses.destroy', $row) }}" onsubmit="return confirm('Delete this course?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">No courses yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
