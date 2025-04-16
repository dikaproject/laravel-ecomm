<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new order directly from product page.
     */
    public function store(Request $request, $productId)
    {
        // Validate request
        $request->validate([
            'quantity' => 'nullable|integer|min:1',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|in:QRIS,Transfer Bank',
        ]);

        // Get product
        $product = Product::findOrFail($productId);
        $quantity = $request->quantity ?? 1;
        
        // Calculate total price
        $totalPrice = $product->price * $quantity;
        
        // Create new order
        $order = Order::create([
            'user_id' => Auth::id(),
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
            'total_price' => $totalPrice,
            'shipping_address' => $request->shipping_address,
        ]);
        
        // Create order item
        OrderItems::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);
        
        return redirect()->route('payment', ['order' => $order->id])
            ->with('success', 'Order created successfully. Please complete your payment.');
    }
    
    /**
     * Show payment page
     */
    public function payment(Order $order)
    {
        // Check if order belongs to current user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('shop.payment', compact('order'));
    }
    
    /**
     * Upload payment proof
     */
    public function uploadPaymentProof(Request $request, Order $order)
    {
        // Check if order belongs to current user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        $request->validate([
            'payment_proof' => 'required|image|max:2048', // max 2MB
        ]);
        
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('payment_proofs', $fileName, 'public');
            
            $order->payment_proof = 'storage/' . $filePath;
            $order->status = 'Paid'; // Change to Paid after proof uploaded
            $order->save();
            
            return redirect()->route('history')
                ->with('success', 'Payment proof uploaded successfully. Your order is being processed.');
        }
        
        return back()->with('error', 'Failed to upload payment proof.');
    }
    
    /**
     * Show order history for the user
     */
    public function history()
    {
        $orders = Auth::user()->orders()->with('items.product')->latest()->get();
        return view('dashboard.history.index', compact('orders'));
    }
}