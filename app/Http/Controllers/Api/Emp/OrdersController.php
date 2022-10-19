<?php

namespace App\Http\Controllers\Api\Emp;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function AllNewOrders() {
        $orders = Order::where('status', 'Pending')->latest('id')->get();
        return response()->json(['data' => $orders], 200);
    }
}
