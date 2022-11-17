<?php

namespace App\Http\Controllers\Api\Emp;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function AllNewOrders($id) {
        $emp = Employee::findOrFail($id);
         if($emp->cat_id) {
            $orders = Order::where('status', 'Pending')->where('cat_id', $emp->cat_id)->with('category')
            // ->with(['books' => function ($query) use ($id) {
            //     $query->where('employee_id', $id);
            // }])
            ->latest('id')->get();
        }
        else {
            $orders = [];
        }
         return response()->json(['data' => $orders], 200);
    }
}
