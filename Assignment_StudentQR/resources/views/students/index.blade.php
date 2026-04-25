@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h2 class="fw-bold m-0" style="letter-spacing: -0.5px;">Students</h2>
        <p class="text-muted m-0 mt-1">Manage and view QR profiles.</p>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-modern">Add Student</a>
</div>

<div class="card-modern mb-4 p-2">
    <form action="{{ route('students.index') }}" method="GET" class="d-flex gap-2 p-1">
        <input type="text" name="search" class="form-control border-0 bg-transparent shadow-none" placeholder="Search by id, name, course..." value="{{ request('search') }}">
        @if(request('search'))
        <a href="{{ route('students.index') }}" class="btn btn-light btn-modern text-muted">Clear</a>
        @endif
        <button type="submit" class="btn btn-outline-dark btn-modern px-4">Search</button>
    </form>
</div>

<div class="card-modern p-1">
    <table class="table table-hover align-middle mb-0">
        <thead style="background-color: #f8fafc;">
            <tr>
                <th class="ps-4 py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Picture</th>
                <th class="py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">QR Code</th>
                <th class="py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Student ID</th>
                <th class="py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Name</th>
                <th class="py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Course</th>
                <th class="py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Major</th>
                <th class="py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Year Level</th>
                <th class="text-end pe-4 py-3 border-0 text-muted small fw-semibold text-uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td class="ps-4">
                    <img src="{{ asset('storage/' . $student->photo_path) }}" class="img-avatar" alt="Profile">
                </td>
                <td>{!! $student->qr !!}</td>
                <td class="text-muted small">{{ $student->student_number }}</td>
                <td class="text-muted small">{{ $student->name }}</td>
                <td class="text-muted small">{{ $student->program }}</td>
                <td class="text-muted small">{{ $student->major }}</td>
                <td class="text-muted small">{{ $student->year_level }}</td>
                <td class="text-end pe-4 text-nowrap">
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-light fw-medium">View</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-light fw-medium ms-1">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline ms-1">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-light text-danger fw-medium" onclick="return confirm('Delete this record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-5">
                    <div class="text-muted">No student records found.</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection