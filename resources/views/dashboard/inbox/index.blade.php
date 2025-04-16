@extends('layouts.app')

@section('title', 'Admin - Order Inbox')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-primary mb-8">Order Inbox</h1>
    
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#{{ $order->id }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $order->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    @foreach ($order->items as $item)
                                        <div>{{ $item->product->name }} x {{ $item->quantity }}</div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp. {{ number_format($order->total_price, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($order->status)
                                    @case('Pending')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                        @break
                                    @case('Paid')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Paid
                                        </span>
                                        @break
                                    @case('Shipped')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                            Shipped
                                        </span>
                                        @break
                                    @case('Completed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                        @break
                                    @case('Cancelled')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Cancelled
                                        </span>
                                        @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="relative inline-block text-left">
                                    <button onclick="toggleDropdown('dropdown-{{ $order->id }}')" class="text-primary hover:text-red-900">
                                        Update Status
                                    </button>
                                    
                                    <!-- Dropdown menu -->
                                    <div id="dropdown-{{ $order->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                        <div class="py-1">
                                            <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <input type="hidden" name="status" value="Pending">
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Mark as Pending
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <input type="hidden" name="status" value="Paid">
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Mark as Paid
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <input type="hidden" name="status" value="Shipped">
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Mark as Shipped
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <input type="hidden" name="status" value="Completed">
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Mark as Completed
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <input type="hidden" name="status" value="Cancelled">
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                                    Cancel Order
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- View Payment Proof button -->
                                @if ($order->payment_proof)
                                    <a href="#" onclick="openPaymentProofModal('{{ asset($order->payment_proof) }}')" class="text-blue-600 hover:text-blue-900 ml-4">
                                        View Proof
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                No orders found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-3 border-t">
            {{ $orders->links() }}
        </div>
    </div>
    
    <!-- Payment Proof Modal -->
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
    // Toggle dropdown menu
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
        
        // Close other dropdowns
        document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
            if (el.id !== id && !el.classList.contains('hidden')) {
                el.classList.add('hidden');
            }
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', event => {
            if (!event.target.closest('button') && !event.target.closest(`#${id}`)) {
                dropdown.classList.add('hidden');
            }
        });
    }
    
    // Payment proof modal functions
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