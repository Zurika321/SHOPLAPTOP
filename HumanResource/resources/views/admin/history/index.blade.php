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
            <th>Name</th>
            <th>Group Name</th>
            <th>Modified Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {{--  --}}
    </tbody>
</table>
@endsection
