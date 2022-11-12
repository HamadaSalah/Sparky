<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function AddNewOrder(Request $request) {
        $request->validate([
            'cat_id' => 'required|numeric',
            'subcat_id' => 'required|array',
            'user_id' => 'required|numeric'
        ]);
        $requestData = $request->only(['cat_id', 'subcat_id','user_id']);
        $order = Order::create($requestData);
        // $emp = User::findOrFail($request->user_id);
        // $employees =   Employee::selectRaw("ST_Distance_Sphere(
        //     Point($emp->lang, $emp->lat), 
        //     Point(lang, lat)
        // ) * ? as distance", [1000])
        // ->whereRaw("ST_Distance_Sphere(
        //             Point($emp->lang, $emp->lat), 
        //             Point(lang, lat)
        //         ) <  ? ", 50000)
        // ->select(['id', 'name', 'photo', 'phone', 'fcm_token'])->get();
        // $employees = Employee::with('ratings')->get();
        $order = Order::with(['category'])->find($order->id);
        $subcat = Category::findMany($order->subcat_id);
        return response()->json(['data' => $order, 'subcats' => $subcat], 200);
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
        $orders = Order::where('user_id', $id)->with('category')->get();
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
        $order = Order::with('books:id,order_id,employee_id' , 'books.employee:id,name,email,phone')->findOrFail($id);
        return response()->json(['data' => $order ], 200);
    }
    public function SendLocation(Request $request) {
        $request->validate([
            'lang' => 'required',
            'lat' => 'required',
            'user_id' => 'required',
        ]);
        $user = User::findOrFail($request->user_id);
        $user->update([
            'lang' => $request->lang,
            'lat' => $request->lat,
        ]);
        return response()->json(['user' => $user]);
    }
    public function employeeprofile($id, Request $request) {
         if($request->order_id) {
            $orderId = $request->order_id;
            $empl = Employee::with('ratings')->with('ratings.user')->with(['book' => function ($query) use($orderId ) {
                $query->where('order_id',  $orderId);
            }])->get();
             return response()->json(['employee' => $empl ], 200);
    }
        else {
            $empl = Employee::with('ratings')->with('ratings.user')->findOrFail($id);

            return response()->json(['employee' => $empl], 200);

        }
    }
    public function NewOrders($id) {
        $orders = Order::where('status', 'Pending')->where('user_id', $id)->get();
        return response()->json(['orders' => $orders], 200);
    }
    public function addNewRating(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'employee_id' => 'required',
            'stars' => 'required',
            'comment' => 'required',
        ]);
        $requestData = $request->only(['user_id','employee_id','stars','comment']);
        $rat = Rating::create($requestData);
        return response()->json(['ratings' => $rat], 200);

    }
    public function SelectEmployeeToOrder(Request $request) {
        $request->validate([
            'employee_id' => 'required',
            'order_id' => 'required',
        ]);
        $order = Order::findOrFail($request->order_id);
        $order->update([
            'employee_id' => $request->employee_id,
            'status' => 'Current',
        ]);
        return response()->json(['data' => $order], 200);

    }
    public function changeOrderStatus(Request $request) {
        $request->validate([
            'order_id' => 'required',
            'status' => 'required',
        ]);
        $order = Order::findOrFail($request->order_id);
        $order->update([
            'status' => $request->status,
        ]);
        return response()->json(['data' => $order], 200);

    }
}
