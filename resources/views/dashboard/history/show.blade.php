@extends('layouts.app')

@section('title', 'Order Details - GetOurThrift')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-6">
        <a href="{{ route('history') }}" class="text-primary hover:text-red-700 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-primary">Order #{{ $order->id }}</h1>
    </div>
    
    <!-- Order Status Badge -->
    <div class="mb-6 flex items-center">
        <span class="text-gray-600 mr-2">Status:</span>
        @switch($order->status)
            @case('Pending')
                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                @break
            @case('Paid')
                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full">Paid</span>
                @break
            @case('Shipped')
                <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full">Shipped</span>
                @break
            @case('Completed')
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full">Completed</span>
                @break
            @case('Cancelled')
                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full">Cancelled</span>
                @break
        @endswitch
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Order Summary -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold">Order Summary</h2>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Order Date</h3>
                        <p>{{ $order->created_at->format('d F Y, h:i A') }}</p>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Payment Method</h3>
                        <p>{{ $order->payment_method }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Shipping Address</h3>
                        <p class="whitespace-pre-line">{{ $order->shipping_address }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Order Items -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold">Order Items</h2>
                </div>
                <div class="p-6">
                    <div class="divide-y">
                        @foreach ($order->items as $item)
                            <div class="py-4 {{ $loop->first ? 'pt-0' : '' }}">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 w-16 h-16">
                                        <img 
                                            src="{{ asset($item->product->image) }}" 
                                            alt="{{ $item->product->name }}" 
                                            class="w-full h-full object-cover rounded"
                                        >
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-gray-800 font-medium">{{ $item->product->name }}</h3>
                                        <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-800 font-medium">Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500">Subtotal: Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t">
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Total</span>
                        <span class="text-lg font-bold text-primary">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Order Timeline and Payment -->
        <div class="lg:col-span-1">
            <!-- Order Timeline -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold">Order Timeline</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <div class="flex">
                            <div class="flex flex-col items-center mr-4">
                                <div class="rounded-full h-8 w-8 bg-primary text-white flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="h-full border-l-2 border-gray-200"></div>
                            </div>
                            <div>
                                <h3 class="text-gray-800 font-medium">Order Placed</h3>
                                <p class="text-sm text-gray-500">{{ $order->created_at->format('d F Y, h:i A') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex">
                            <div class="flex flex-col items-center mr-4">
                                <div class="rounded-full h-8 w-8 {{ $order->status != 'Pending' ? 'bg-primary text-white' : 'bg-gray-200' }} flex items-center justify-center">
                                    @if($order->status != 'Pending')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="h-full border-l-2 border-gray-200"></div>
                            </div>
                            <div>
                                <h3 class="text-gray-800 font-medium">Payment {{ $order->status != 'Pending' ? 'Confirmed' : 'Pending' }}</h3>
                                @if($order->status != 'Pending')
                                    <p class="text-sm text-gray-500">Your payment has been confirmed.</p>
                                @else
                                    <p class="text-sm text-gray-500">Waiting for payment confirmation.</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex">
                            <div class="flex flex-col items-center mr-4">
                                <div class="rounded-full h-8 w-8 {{ in_array($order->status, ['Shipped', 'Completed']) ? 'bg-primary text-white' : 'bg-gray-200' }} flex items-center justify-center">
                                    @if(in_array($order->status, ['Shipped', 'Completed']))
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="h-full border-l-2 border-gray-200"></div>
                            </div>
                            <div>
                                <h3 class="text-gray-800 font-medium">Shipped</h3>
                                @if(in_array($order->status, ['Shipped', 'Completed']))
                                    <p class="text-sm text-gray-500">Your order has been shipped.</p>
                                @else
                                    <p class="text-sm text-gray-500">Your order will be shipped soon.</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex">
                            <div class="flex flex-col items-center mr-4">
                                <div class="rounded-full h-8 w-8 {{ $order->status == 'Completed' ? 'bg-primary text-white' : 'bg-gray-200' }} flex items-center justify-center">
                                    @if($order->status == 'Completed')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <h3 class="text-gray-800 font-medium">Delivered</h3>
                                @if($order->status == 'Completed')
                                    <p class="text-sm text-gray-500">Your order has been delivered.</p>
                                @else
                                    <p class="text-sm text-gray-500">Your order will be delivered soon.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Details -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-lg font-semibold">Payment Details</h2>
                </div>
                <div class="p-6">
                    @if($order->payment_proof)
                        <div class="mb-4">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Payment Proof</h3>
                            <div class="relative">
                                <img 
                                    src="{{ asset($order->payment_proof) }}" 
                                    alt="Payment Proof" 
                                    class="w-full h-auto rounded"
                                >
                                <button 
                                    onclick="openPaymentProofModal('{{ asset($order->payment_proof) }}')" 
                                    class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow hover:bg-gray-100"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @elseif($order->status === 'Pending')
                        <div class="text-center py-4">
                            <p class="text-gray-500 mb-4">Please complete your payment</p>
                            <a href="{{ route('payment', $order->id) }}" class="inline-block bg-primary text-white font-medium py-2 px-6 rounded-md hover:bg-red-700 transition">
                                Complete Payment
                            </a>
                        </div>
                    @endif

                    <!-- Action Button for Completed Orders -->
                    @if($order->status === 'Completed')
                        <div class="mt-6 text-center py-4 border-t border-gray-200">
                            <p class="text-gray-500 mb-4">Thank you for your order!</p>
                            <a href="{{ route('shop') }}" class="inline-block bg-primary text-white font-medium py-2 px-6 rounded-md hover:bg-red-700 transition">
                                Shop Again
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Payment Proof Modal -->
    <div id="paymentProofModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-3xl w-full">
                <div class="px-6 py-4 border-b flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Payment Proof</h3>
                    <button onclick="closePaymentProofModal()" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <img id="proofImage" src="" alt="Payment Proof" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openPaymentProofModal(imageSrc) {
        document.getElementById('proofImage').src = imageSrc;
        document.getElementById('paymentProofModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closePaymentProofModal() {
        document.getElementById('paymentProofModal').classList.add('hidden');
        document.body.style.overflow = '';
    }
</script>
@endpush