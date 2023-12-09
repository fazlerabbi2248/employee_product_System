@extends('layouts')

@section('content')
    <div class="container">
        <h1>Employee List</h1>

        <div class="mb-3">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>

        <div class="row">
            @foreach($employees as $employee)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                            <p class="card-text">Email: {{ $employee->email }}</p>
                            <p class="card-text">Phone: {{ $employee->phone }}</p>
                            <!-- You can add more details here -->
                            <div class="btn-group">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection