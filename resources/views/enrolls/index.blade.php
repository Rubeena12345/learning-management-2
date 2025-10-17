@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Enroll
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2>Enroll List</h2>

        <a href="{{ route('enrolls.create') }}" class="btn btn-success mb-3 mt-3">Create Enroll</a>

        {{-- Example table --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enrolls as $enroll)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $enroll->course->title  }}</td>
                    <td>
                        <a href="{{ route('enrolls.edit', $enroll->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('enrolls.destroy', $enroll->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No enrolls found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection