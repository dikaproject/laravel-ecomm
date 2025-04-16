<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get regular users
        $users = User::where('role', 'user')->get();
        
        // Get products
        $products = Product::all();
        
        // Create some random orders
        foreach ($users as $user) {
            // Create 1-3 orders per user
            $orderCount = rand(1, 3);
            
            for ($i = 0; $i < $orderCount; $i++) {
                // Random status selection
                $statuses = ['Pending', 'Paid', 'Completed', 'Shipped', 'Cancelled'];
                $randomStatus = $statuses[array_rand($statuses)];
                
                // Random payment method
                $paymentMethods = ['QRIS', 'Transfer Bank'];
                $randomPaymentMethod = $paymentMethods[array_rand($paymentMethods)];
                
                // Create order
                $order = Order::create([
                    'user_id' => $user->id,
                    'payment_method' => $randomPaymentMethod,
                    'status' => $randomStatus,
                    'total_price' => 0, // Will update after adding items
                    'shipping_address' => $user->address,
                    'payment_proof' => $randomStatus !== 'Pending' ? 'storage/payment_proofs/sample-payment.jpg' : null,
                ]);
                
                // Add 1-3 products to the order
                $itemCount = rand(1, 3);
                $total = 0;
                
                for ($j = 0; $j < $itemCount; $j++) {
                    $product = $products->random();
                    $quantity = rand(1, 2);
                    
                    OrderItems::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $product->price,
                    ]);
                    
                    $total += $product->price * $quantity;
                }
                
                // Update order total
                $order->update(['total_price' => $total]);
            }
        }
    }
}