<?php

namespace App\Http\Controllers\Api\Emp;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function AllNewOrders($id) {
        $emp = Employee::find($id);
        if(!$emp ) {
            return response()->json(['error' => 'EMployee Not Found'], 200);
        }
         if($emp->cat_id) {
            $orders = Order::
            where('cat_id', $emp->cat_id)->with('category')->with('user')
            ->with(['books' => function ($query) use ($id) {
                $query->where('employee_id', $id);
            }])
            // ->selectRaw("ST_Distance_Sphere(
            //     Point($emp->lang, $emp->lat), 
            //     Point(lang, lat)
            // ) * ? as distance", [.000621371192])
            ->whereRaw("ST_Distance_Sphere(
                Point($emp->lang, $emp->lat), 
                Point(lang, lat)
            ) <  ? ", $emp->max_dis)
            ->whereRaw("ST_Distance_Sphere(
                Point($emp->lang, $emp->lat),
                Point(lang, lat)
            ) <  max_dis ")

            ->latest('id')->get();
        }
        else {
            $orders = [];
        }
         return response()->json(['data' => $orders], 200);
    }
}
