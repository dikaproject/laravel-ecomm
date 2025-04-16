@extends('layouts.app')

@section('title', 'GetOurThrift - Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl md:text-6xl font-serif text-primary text-center my-10">All Product</h1>
        
        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="product-card group">
                    <a href="{{ route('shop.product', $product->id) }}" class="block bg-gray-200 rounded-lg overflow-hidden">
                        <div class="aspect-w-1 aspect-h-1 relative">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                        </div>
                    </a>
                    <div class="mt-4">
                        <p class="text-gray-500 text-sm">{{ $product->category }}</p>
                        <h3 class="text-lg font-medium">{{ $product->name }}</h3>
                        <p class="text-gray-700">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- See All Button -->
        <div class="flex justify-center mt-12">
            <a href="{{ route('shop.all') }}" class="border border-primary text-primary px-8 py-3 rounded-md hover:bg-primary hover:text-white transition duration-300">See All</a>
        </div>
        
        <h1 class="text-4xl md:text-6xl font-serif text-primary text-center my-16">Treasure</h1>
        
        <!-- Treasure Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 mb-12">
            @foreach($treasureProducts as $product)
                <div class="product-card group">
                    <a href="{{ route('shop.product', $product->id) }}" class="block bg-gray-200 rounded-lg overflow-hidden">
                        <div class="aspect-w-1 aspect-h-1 relative">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                        </div>
                    </a>
                    <div class="mt-4">
                        <p class="text-gray-500 text-sm">{{ $product->category }}</p>
                        <h3 class="text-lg font-medium">{{ $product->name }}</h3>
                        <p class="text-gray-700">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Newsletter Section -->
    <section class="bg-primary text-white py-10 px-4">
        <div class="container mx-auto">
            <div class="max-w-xl mx-auto">
                <h3 class="text-2xl font-bold mb-4">Get On the List!</h3>
                <p class="text-white/80 mb-6">Sign Up with your email address to receive updates</p>
                
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email..." class="px-4 py-2 border border-white/20 bg-white/10 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-white flex-grow" required>
                    <button type="submit" class="px-6 py-2 bg-white text-primary font-medium rounded-md hover:bg-gray-100 transition">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .aspect-w-1 {
        position: relative;
        padding-bottom: 100%;
    }
    
    .aspect-w-1 img {
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        object-fit: cover;
    }
</style>
@endpush