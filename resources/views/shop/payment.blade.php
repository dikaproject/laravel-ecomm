@extends('layouts.app')

@section('title', 'Payment - GetOurThrift')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-primary mb-8">Complete Your Payment</h1>
    
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Order Summary</h2>
        
        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Order ID:</span>
                <span class="font-medium">#{{ $order->id }}</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Total Amount:</span>
                <span class="font-medium">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Payment Method:</span>
                <span class="font-medium">{{ $order->payment_method }}</span>
            </div>
        </div>
        
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-3">Items:</h3>
            @foreach ($order->items as $item)
                <div class="flex justify-between mb-2">
                    <div class="flex items-center">
                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded mr-3">
                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                    </div>
                    <span>Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>
        
        <div class="bg-gray-100 p-4 rounded-md">
            <h3 class="text-lg font-semibold mb-3">Payment Instructions</h3>
            
            @if ($order->payment_method == 'QRIS')
                <div class="mb-4">
                    <p class="mb-2">Scan this QR code to complete payment:</p>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/qris.png') }}" alt="QRIS Code" class="w-48 h-48">
                    </div>
                </div>
            @else
                <div class="mb-4">
                    <p class="mb-2">Please transfer to our bank account:</p>
                    <div class="bg-white p-3 rounded">
                        <p class="font-semibold">Bank BCA</p>
                        <p>Account Number: 1234567890</p>
                        <p>Account Name: GetOurThrift</p>
                    </div>
                </div>
            @endif
            
            <p class="text-sm text-gray-600">After completing payment, please upload proof of payment below.</p>
        </div>
    </div>
    
    <!-- Payment Proof Upload Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Upload Payment Proof</h2>
        
        <form action="{{ route('payment.upload', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="payment_proof" class="block text-gray-700 mb-2">Upload Screenshot/Image of Payment Proof</label>
                <input 
                    type="file" 
                    id="payment_proof" 
                    name="payment_proof" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    accept="image/*"
                    required
                >
                @error('payment_proof')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-primary text-white font-medium rounded-md hover:bg-red-700 transition">
                    Submit Payment
                </button>
            </div>
        </form>
    </div>
</div>
@endsection