@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h2>{{ $viewData['title'] }}</h2>
{{-- <form action="{{ route('admin.departments.index') }}" method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search employees..." value="{{ request()->query('search') }}">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
</form> --}}
{{-- nút tạo --}}
{{-- <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">Add Department</a> --}}
<table class="table">
    <thead>
        <tr>
            <th>Shft ID</th>
            <th>Name</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['shift'] as $shift)
        <tr>
            <td>{{ $shift->ShiftId }}</td>
            <td>{{ $shift->Name }}</td>
            <td>{{ $shift->StartTime }}</td>
            <td>{{ $shift->EndTime }}</td>
            <td>
                {{-- xem chi tiết --}}
                <a href="{{ route('admin.shift.show', ['shift' => $shift->ShiftId]) }}" class="btn btn-info">Details</a>
                {{-- nút edit --}}
                <a href="{{ route('admin.shift.edit', ['shift' => $shift->ShiftId]) }}" class="btn btn-primary">Edit</a>
                {{-- nút xóa --}}
                <form action="{{ route('admin.shift.destroy', ['shift' => $shift->ShiftId]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') <!-- Xác định phương thức DELETE -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shift?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
