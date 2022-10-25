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

}
