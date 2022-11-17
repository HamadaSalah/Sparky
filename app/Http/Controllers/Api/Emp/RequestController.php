<?php

namespace App\Http\Controllers\Api\Emp;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function bidRequest(Request $request) {
        $request->validate([
            'order_id' => 'required',
            'employee_id'=> 'required'
        ]);
        if(OrderRequest::where('order_id', $request->order_id)->where('employee_id', $request->employee_id)->get()->count() > 0) {
        return response()->json(['data' => 'Can\'t Bid On Same Project'], 200);
        }
        else {
            $requestData = $request->only(['order_id', 'employee_id']);
            $Newrequest = OrderRequest::create($requestData);
            return response()->json(['data' => $Newrequest], 200);
        }
    }
    public function mybids($id) {
        $mybids = OrderRequest::with('order')->where('employee_id', $id)->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function MyCurrentBid($id) {
        $mybids = order::with('category')->where('employee_id', $id)->where('status', 'Current')->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function MyCompletedBid($id) {
        $mybids = order::where('employee_id', $id)->where('status', 'Completed')->with('category', 'books', 'books.employee')->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function MyCanceledBid($id) {
        $mybids = order::where('employee_id', $id)->where('status', 'Canceled')->with('category', 'books', 'books.employee')->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function NewEmployeeOrders($id) {
        $orders = Book::where('employee_id', $id)->get();
        return response()->json(['data' => $orders], 200);
    }
    //ACEPT ORDER
    public function ChangeBookStatus(Request $request) {
        $request->validate([
            'order_id' => 'required',
            'employee_id' => 'required',
        ]);
        $requestData = $request->only(['order_id', 'employee_id']);
        $order = Book::create($requestData);
        return response()->json(['data' => $order], 200);
    }
}
