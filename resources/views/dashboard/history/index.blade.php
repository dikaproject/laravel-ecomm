@extends('layouts.app')

@section('title', 'Order History - GetOurThrift')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-primary mb-8">Your Order History</h1>
    
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    @if ($orders->isEmpty())
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <p class="text-xl text-gray-500">You haven't placed any orders yet.</p>
            <a href="{{ route('shop') }}" class="mt-4 inline-block px-6 py-2 bg-primary text-white font-medium rounded-md hover:bg-red-700 transition">
                Start Shopping
            </a>
        </div>
    @else
        <div class="space-y-6">
            @foreach ($orders as $order)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold">Order #{{ $order->id }}</h3>
                                <p class="text-sm text-gray-500">{{ $order->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                            <div>
                                @switch($order->status)
                                    @case('Pending')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Pending</span>
                                        @break
                                    @case('Paid')
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Paid</span>
                                        @break
                                    @case('Shipped')
                                        <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">Shipped</span>
                                        @break
                                    @case('Completed')
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Completed</span>
                                        @break
                                    @case('Cancelled')
                                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">Cancelled</span>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="space-y-3">
                            @foreach ($order->items as $item)
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded mr-3">
                                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                                    </div>
                                    <span>Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-6 py-3 bg-gray-50 flex justify-between items-center">
                        <div>
                            <span class="text-gray-600 text-sm">Total:</span>
                            <span class="font-semibold ml-1">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        
                        @if ($order->status === 'Pending')
                            <a href="{{ route('payment', $order->id) }}" class="px-4 py-1 bg-primary text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                                Complete Payment
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    <!-- Payment Proof Modal for viewing proof if needed -->
    <div id="paymentProofModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-2xl w-full">
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