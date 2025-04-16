@extends('layouts.app')

@section('title', 'GetOurThrift - ' . $product->name)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumbs -->
        <div class="flex items-center text-sm text-gray-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('shop') }}" class="hover:text-primary transition-colors">Shop</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">{{ $product->name }}</span>
        </div>

        <!-- Product Display -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Product Images -->
            <div class="w-full md:w-1/2">
                <div class="bg-gray-100 rounded-xl overflow-hidden">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
                </div>
            </div>

            <!-- Product Info -->
            <div class="w-full md:w-1/2">
                @if($product->category)
                    <div class="inline-block bg-primary/10 text-primary px-3 py-1 rounded-md text-sm font-medium mb-4">
                        {{ $product->category }}
                    </div>
                @endif
                
                <h1 class="text-3xl md:text-4xl font-serif text-gray-900 mb-2">{{ $product->name }}</h1>
                
                <div class="text-2xl font-semibold text-primary mb-4">
                    Rp. {{ number_format($product->price, 0, ',', '.') }}
                </div>
                
                <div class="space-y-4 mb-6 border-b border-gray-200 pb-6">
                    <p class="text-gray-600">{{ $product->description ?? 'No description available' }}</p>
                    
                    @if($product->size)
                        <div class="flex items-center">
                            <span class="text-gray-700 font-medium w-24">Size:</span>
                            <span class="text-gray-600">{{ $product->size }}</span>
                        </div>
                    @endif
                    
                    @if($product->condition)
                        <div class="flex items-center">
                            <span class="text-gray-700 font-medium w-24">Condition:</span>
                            <span class="text-gray-600">{{ $product->condition }}</span>
                        </div>
                    @endif
                    
                    <div class="flex items-center">
                        <span class="text-gray-700 font-medium w-24">Status:</span>
                        <span class="text-green-600 font-medium">Available</span>
                    </div>
                </div>
                
                <!-- Order Form -->
                <form action="{{ route('order.store', $product->id) }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Shipping Address -->
                    <div>
                        <label for="shipping_address" class="block text-gray-700 font-medium mb-2">Shipping Address</label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" 
                            class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-primary focus:border-primary"
                            required>{{ Auth::check() ? Auth::user()->address : '' }}</textarea>
                    </div>
                    
                    <!-- Payment Method -->
                    <div>
                        <label for="payment_method" class="block text-gray-700 font-medium mb-2">Payment Method</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="relative border border-gray-300 rounded-md p-4 cursor-pointer hover:border-primary transition-colors">
                                <input type="radio" name="payment_method" value="QRIS" class="sr-only" checked>
                                <div class="flex items-center">
                                    <div class="w-6 h-6 border border-gray-400 rounded-full mr-3 flex items-center justify-center payment-radio">
                                        <div class="w-3 h-3 rounded-full bg-primary hidden payment-dot"></div>
                                    </div>
                                    <span>QRIS</span>
                                </div>
                            </label>
                            <label class="relative border border-gray-300 rounded-md p-4 cursor-pointer hover:border-primary transition-colors">
                                <input type="radio" name="payment_method" value="Transfer Bank" class="sr-only">
                                <div class="flex items-center">
                                    <div class="w-6 h-6 border border-gray-400 rounded-full mr-3 flex items-center justify-center payment-radio">
                                        <div class="w-3 h-3 rounded-full bg-primary hidden payment-dot"></div>
                                    </div>
                                    <span>Transfer Bank</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full py-3 bg-primary text-white font-medium rounded-md hover:bg-primary/90 transition-colors flex items-center justify-center">
                            Buy Now
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Related Products Section -->
        <div class="mt-20 mb-10">
            <div class="flex items-center justify-center space-x-4">
                <div class="h-0.5 w-8 bg-primary"></div>
                <h2 class="text-2xl md:text-3xl font-serif text-primary text-center">You May Also Like</h2>
                <div class="h-0.5 w-8 bg-primary"></div>
            </div>
        </div>
        
        <!-- Related Products (Add this if you want to show related products) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
            <!-- You can add related products logic here -->
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Radio button custom styling */
    input[type="radio"]:checked ~ div .payment-dot {
        display: block;
    }
    
    input[type="radio"]:checked + div {
        border-color: #CD3F37;
    }
    
    input[type="radio"]:checked ~ div .payment-radio {
        border-color: #CD3F37;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Custom radio button handling
        const radioInputs = document.querySelectorAll('input[type="radio"][name="payment_method"]');
        radioInputs.forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('.payment-dot').forEach(dot => {
                    dot.classList.add('hidden');
                });
                if (this.checked) {
                    this.closest('label').querySelector('.payment-dot').classList.remove('hidden');
                }
            });
        });
    });
</script>
@endpush