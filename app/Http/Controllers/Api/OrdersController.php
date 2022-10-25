<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Employee;
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
        $emp = Employee::findOrFail($request->user_id);
        $employees =   Employee::selectRaw("ST_Distance_Sphere(
            Point($emp->lang, $emp->lat), 
            Point(lang, lat)
        ) * ? as distance", [1000])
        ->whereRaw("ST_Distance_Sphere(
                    Point($emp->lang, $emp->lat), 
                    Point(lang, lat)
                ) <  ? ", 50000)
        ->select(['id', 'name', 'photo', 'phone', 'fcm_token'])->get();
        return response()->json(['data' => $order, 'Employees' => $employees], 200);
    }
    public function BookOrder(Request $request) {
        $request->validate([
            'order_id' => 'required',
            'user_id' => 'required',
            'employee_id' => 'required'
        ]);
        $requestData = $request->only(['order_id','user_id','employee_id']);
        $book = Book::create($requestData);
        $book = Book::with('user')->with('order')->with('employee')->findOrFail($book->id);
        return response()->json(['data'=> $book], 200);
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
            'order_id' => 'required',
            'user_id' => 'required',
        ]);
        $user = User::findOrFail($request->user_id);
        $order = Order::findOrFail($request->user_id);
        $user->update([
            'lang' => $request->lang,
            'lat' => $request->lat,
        ]);
        $order->update([
            'lang' => $request->lang,
            'lat' => $request->lat,
        ]);
        return response()->json(['user' => $user, 'order' => $order]);
    }
    public function employeeprofile($id) {
        $empl = Employee::findOrFail($id);
        return response()->json(['employee' => $empl], 200);
    }
}
