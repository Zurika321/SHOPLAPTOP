@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<h2>{{ $viewData['title'] }}</h2>
<form action="{{ route('admin.departments.index') }}" method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search employees..." value="{{ request()->query('search') }}">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
</form>
{{-- nút tạo --}}
<a href="{{ route('admin.departments.create') }}" class="btn btn-primary">Add Department</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Group Name</th>
            <th>Modified Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['departments'] as $department)
        <tr>
            <td>{{ $department->Name }}</td>
            <td>{{ $department->GroupName }}</td>
            <td>{{ $department->ModifiedDate }}</td>
            <td>
                 {{-- xem nhân viên --}}
                 <a href="{{ route('admin.departments.show', ['department' => $department->DepartmentID]) }}" class="btn btn-info">View Employees</a>
                {{-- nút edit --}}
                <a href="{{ route('admin.departments.edit', ['department' => $department->DepartmentID]) }}" class="btn btn-primary">Edit</a>
                {{-- nút xóa --}}
                <form action="{{ route('admin.departments.destroy', ['department' => $department->DepartmentID]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
