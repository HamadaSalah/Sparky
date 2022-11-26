<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['allcats', 'subcats' ]]);
    }

    public function allcats() {
        return response()->json(['data'=>Category::where('category_id', null)->with('categories')->get()]);
    }
    public function subcats($id) {
        $subs = Category::where('category_id', $id)->get();
        return response()->json(["data" => $subs], 200);
    }
}
