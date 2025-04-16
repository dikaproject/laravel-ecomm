<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        // Get counts for dashboard widgets
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'Pending')->count();
        $shippedOrders = Order::where('status', 'Shipped')->count();
        $completedOrders = Order::where('status', 'Completed')->count();
        $totalProducts = Product::count();
        $totalUsers = User::where('role', 'user')->count();
        
        // Get recent orders
        $recentOrders = Order::with(['user', 'items.product'])
            ->latest()
            ->limit(5)
            ->get();
            
        return view('dashboard.admin.index', compact(
            'totalOrders', 
            'pendingOrders', 
            'shippedOrders', 
            'completedOrders',
            'totalProducts',
            'totalUsers',
            'recentOrders'
        ));
    }
}