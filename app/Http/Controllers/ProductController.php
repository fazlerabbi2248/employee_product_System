<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{

    public function index(): view
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }


    public function create(): view
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'about' => 'required',
            'price' => 'required|numeric',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Upload and save thumbnail image
        if ($request->hasFile('thumbnail_image')) {
            $thumbnailImage = $request->file('thumbnail_image');
            $thumbnailImageName = time() . '_' . $thumbnailImage->getClientOriginalName();
            $thumbnailImage->storeAs('public/thumbnails', $thumbnailImageName);
            $validatedData['thumbnail_image'] = 'thumbnails/' . $thumbnailImageName;
        }
    
        // Create the product
        $product = Product::create([
            'product_name' => $validatedData['product_name'],
            'details' => $validatedData['about'],
            'price' => $validatedData['price'],
            'thumbnail_image' => $validatedData['thumbnail_image'],
        ]);
    
        // Upload and save product images
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/product_images', $imageName);
    
                // Store image in product_images table with product_id
                $product->images()->create(['image' => 'product_images/' . $imageName]);
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productImages = ProductImage::where('product_id', $id)->get();

        return view('products.show', compact('product', 'productImages'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'product_name' => 'required',
        'details' => 'nullable',
        'price' => 'required|numeric',
        'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('thumbnail_image')) {
        $image = $request->file('thumbnail_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/thumbnails', $imageName);
        $validatedData['thumbnail_image'] = 'thumbnails/' . $imageName;
    }

    $product->update($validatedData);

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }


    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
    
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
