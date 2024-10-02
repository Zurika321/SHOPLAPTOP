@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
<div class="container mt-5">
    <h2>{{ $viewData['title'] }}</h2>

    <div class="card mb-4">
        <div class="card-header">
            Department: {{ $viewData['department']->Name }}
        </div>
        <div class="card-body">
            <h4>Employees:</h4>
            <ul>
                @foreach ($viewData['department']->employees as $employee)
                    <li>{{ $employee->JobTitle }} - {{ $employee->NationalIDNumber }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back to Department List</a>
</div>
@endsection
