@extends('layouts')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" id="details" name="details">{{ $product->details }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
            </div>

            <div class="form-group">
               <label for="thumbnail_image">Thumbnail Image</label>
               <input type="file" class="form-control-file" id="thumbnail_image" value="{{ asset('storage/' . $product->thumbnail_image) }}"  name="thumbnail_image">
           </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
