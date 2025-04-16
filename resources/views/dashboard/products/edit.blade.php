@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-primary">Edit Product</h1>
        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-primary">
            &larr; Back to Products
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Product Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-2">Price (Rp)</label>
                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price', $product->price) }}"
                    min="0"
                    step="1000"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    required
                >
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Current Image</label>
                @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-40 object-cover rounded mb-2">
                @else
                    <p class="text-gray-500">No image uploaded</p>
                @endif
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-medium mb-2">Change Image</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    accept="image/*"
                >
                <p class="text-gray-500 text-sm mt-1">Upload a new product image (max 2MB)</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-primary text-white font-medium rounded-md hover:bg-red-700 transition">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
