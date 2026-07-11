<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
  
public function index(){
    // dd('hi');
    return view('admin.category.index');
}

public function store(Request $request)
{
    // dd('hiii');
    //  dd($request->all());
    $request->validate([

        'category_name'=>'required|min:3|max:100',

        'slug'=>'required|unique:categories,slug',

        'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'status'=>'required'

    ]);

    $imageName=null;

    if($request->hasFile('image')){

        $image=$request->file('image');

        $imageName=time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('uploads/category'),$imageName);

    }

    Category::create([

        'category_name'=>$request->category_name,

        'slug'=>$request->slug,

        'image'=>$imageName,

        'status'=>$request->status

    ]);

    return response()->json([

        'status'=>true,

        'message'=>'Category Added Successfully'

    ]);

}
}
