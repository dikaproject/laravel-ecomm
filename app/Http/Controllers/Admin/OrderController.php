<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders (inbox).
     */
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->latest()->paginate(10);
        return view('dashboard.inbox.index', compact('orders'));
    }
    
    /**
     * Update order status.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:Pending,Paid,Completed,Cancelled,Shipped',
        ]);
        
        $order->status = $request->status;
        $order->save();
        
        return back()->with('success', "Order #{$order->id} status updated to {$request->status}");
    }
}