<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Category.index', [
            'cats' => Category::all(),
            'maincats' =>Category::where('category_id', NULL)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $requestData = $request->only(['name', 'category_id', 'img']);
        if ($request->hasFile('img')) {
             $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'imgs'.'_'.time().'.'.$ext;
            $storagePath = Storage::disk('public_uploads')->put('/cats', $file);
            $storageName = basename($storagePath);
            $requestData['img'] = $storageName;
       }

        Category::create($requestData);
        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Category.edit', [
            'cat' => Category::findOrFail($id),
            'maincats' =>Category::where('category_id', NULL)->get()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $requestData = $request->only(['name', 'category_id', 'img']);
        if ($request->hasFile('img')) {
             $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'imgs'.'_'.time().'.'.$ext;
            $storagePath = Storage::disk('public_uploads')->put('/cats', $file);
            $storageName = basename($storagePath);
            $requestData['img'] = $storageName;
       }
       $cat = Category::findOrFail($id);
       $cat ->update($requestData);
        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');

    }
}
