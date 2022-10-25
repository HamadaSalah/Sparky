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
        $mybids = OrderRequest::with('order')->where('employee_id', $id)->whereRelation('order', 'status', 'Current')->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function MyCompletedBid($id) {
        $mybids = OrderRequest::with('order')->where('employee_id', $id)->whereRelation('order', 'status', 'Completed')->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function MyCanceledBid($id) {
        $mybids = OrderRequest::with('order')->where('employee_id', $id)->whereRelation('order', 'status', 'Canceled')->get();
        return response()->json(['data' => $mybids], 200);
    }
    public function NewEmployeeOrders($id) {
        $orders = Book::where('employee_id', $id)->get();
        return response()->json(['data' => $orders], 200);
    }
    public function ChangeBookStatus(Request $request) {
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);
        $order = Book::findOrFail($request->id);
        $order->update([
            'status' => $request->status
        ]);
        return response()->json(['data' => $order], 200);
    }
}
