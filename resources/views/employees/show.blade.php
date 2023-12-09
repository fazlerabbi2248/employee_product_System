@extends('layouts')

@section('content')
    <div class="container mt-4">
        <h1>Employee Details</h1>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        @if($employee->image)
                            <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" class="img-fluid">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                        <p class="card-text">Email: {{ $employee->email }}</p>
                        <p class="card-text">Phone: {{ $employee->phone }}</p>
                        <p class="card-text">Birth Date: {{ $employee->birth_date }}</p>
                        <p class="card-text">Address: {{ $employee->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
