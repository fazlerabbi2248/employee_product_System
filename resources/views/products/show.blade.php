@extends('layouts')

@section('content')
    <div class="container mt-4">
        <h1>Product Details</h1>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">Details: {{ $product->details }}</p>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <!-- Add other product details here -->
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        @foreach ($productImages as $productImage)
                            <img src="{{ asset('storage/' . $productImage->image) }}" style="width: 100%; height: auto; margin-bottom: 10px;" class="img-fluid" alt="Product Image">
                        @endforeach

                        @if ($productImages->isEmpty())
                            <p>No images available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
