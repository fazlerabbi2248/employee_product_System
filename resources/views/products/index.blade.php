@extends('layouts')

@section('content')
    <div class="container">
        <h1>Products</h1>

        <div class="mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Products</a>
        </div>

        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->thumbnail_image) }}" style="width: 300px; height: 200px;" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <h6 class="card-title">{{ $product->details }}</h6>
                            <p class="card-text">${{ $product->price }}</p>
                            <!-- Add more card details for other fields as needed -->

                            <div class="btn-group" role="group" aria-label="Product Actions">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>
    </div>
@endsection
