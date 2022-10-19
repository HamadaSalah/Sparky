<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function AddNewOrder(Request $request) {
        $request->validate([
            'cat_id' => 'required|numeric',
            'type' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $requestData = $request->only(['cat_id','type','user_id']);
        $order = Order::create($requestData);
        return response()->json(['data' => $order], 200);
    }
    public function myorders($id) {
        $orders = Order::where('user_id', $id)->get();
        return response()->json(['data' => $orders], 200);
    }
    public function myordersCurrent($id) {
        $orders = Order::where('user_id', $id)->where('status', 'Current')->get();
        return response()->json(['data' => $orders], 200);
    }
    public function myordersCompleted($id) {
        $orders = Order::where('user_id', $id)->where('status', 'Completed')->get();
        return response()->json(['data' => $orders], 200);

    }
    public function myordersCanceled($id) {
        $orders = Order::where('user_id', $id)->where('status', 'Canceled')->get();
        return response()->json(['data' => $orders], 200);

    }
    public function order($id) {
        $order = Order::findOrFail($id);
        return response()->json(['data' => $order], 200);
    }
    public function SendLocation(Request $request) {
        $request->validate([
            'lang' => 'required',
            'lat' => 'required',
            'user_id' => 'required'
        ]);
        $user = User::findOrFail($request->user_id);
        $user->update([
            'lang' => $request->lang,
            'lat' => $request->lat,
        ]);
        return response()->json(['data' => $user]);
    }
}
