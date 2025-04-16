@extends('layouts.app')

@section('title', $product->name . ' - GetOurThrift')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Product Image -->
        <div class="w-full md:w-1/2">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg">
        </div>
        
        <!-- Product Details -->
        <div class="w-full md:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            <p class="text-gray-500 mb-4">{{ $product->category ?? 'Thrift' }}</p>
            
            <div class="text-2xl font-semibold text-primary mb-6">
                Rp. {{ number_format($product->price, 0, ',', '.') }}
            </div>
            
            <div class="prose max-w-none mb-8">
                <p>{{ $product->description ?? 'No description available.' }}</p>
            </div>
            
            @auth
                <div class="bg-gray-100 p-6 rounded-lg mb-6">
                    <h3 class="text-lg font-semibold mb-4">Order This Item</h3>
                    
                    <form action="{{ route('order.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700 mb-2">Quantity</label>
                            <input 
                                type="number" 
                                id="quantity" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                            >
                        </div>
                        
                        <div class="mb-4">
                            <label for="shipping_address" class="block text-gray-700 mb-2">Shipping Address</label>
                            <textarea 
                                id="shipping_address" 
                                name="shipping_address" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                                rows="3"
                                required
                            >{{ Auth::user()->address }}</textarea>
                        </div>
                        
                        <div class="mb-6">
                            <label for="payment_method" class="block text-gray-700 mb-2">Payment Method</label>
                            <select 
                                id="payment_method" 
                                name="payment_method" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                                required
                            >
                                <option value="QRIS">QRIS</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary text-white font-medium py-3 px-4 rounded-md hover:bg-red-700 transition">
                            Place Order
                        </button>
                    </form>
                </div>
            @else
                <div class="bg-gray-100 p-6 rounded-lg text-center">
                    <p class="mb-4">Please login to purchase this item</p>
                    <a href="{{ route('login') }}" class="inline-block bg-primary text-white font-medium py-2 px-6 rounded-md hover:bg-red-700 transition">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection