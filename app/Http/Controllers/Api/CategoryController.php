<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allcats() {
        return response()->json(['data'=>Category::with('categories')->get()]);
    }
    public function subcats($id) {
        $subs = Category::where('category_id', $id)->get();
        return response()->json(["data" => $subs], 200);
    }
}
