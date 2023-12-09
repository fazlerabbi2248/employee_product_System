@extends('layouts')

@section('content')
    <div class="container">
        <h1>Add Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <div class="form-group">
                <label for="about">About Product</label>
                <input type="text" class="form-control" id="about" name="about" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <div class="form-group">
               <label for="thumbnail_image">Thumbnail Image</label>
               <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image">
           </div>

            <div class="form-group">
               <label for="product_images">Product Images</label>
               <input type="file" class="form-control-file" id="product_images" name="product_images[]" multiple>
           </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
