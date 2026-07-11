<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
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
    // dd($request,"____");
    // Validate Request
    $request->validate([
        'category_name' => 'required|min:3|max:100|unique:categories,category_name',
        'slug'          => 'required|unique:categories,slug',
        'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status'        => 'required',
    ], [
        'category_name.required' => 'Category Name is required.',
        'category_name.unique'   => 'Category Name already exists.',
        'slug.required'          => 'Slug is required.',
        'slug.unique'            => 'Slug already exists.',
        'image.image'            => 'Please upload a valid image.',
        'image.mimes'            => 'Only JPG, JPEG, PNG and WEBP images are allowed.',
        'image.max'              => 'Image size must not exceed 2MB.',
        'status.required'        => 'Status is required.',
    ]);

    $imageName = null;

    // Upload Image
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $uploadPath = public_path('uploads/category');

        // Create folder if it doesn't exist
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Generate unique image name
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Move image
        $image->move($uploadPath, $imageName);
    }

    // Save Category
    Category::create([
        'category_name' => $request->category_name,
        'slug'          => $request->slug,
        'image'         => $imageName,
        'status'        => $request->status,
    ]);

    return response()->json([
        'status'  => true,
        'message' => 'Category Added Successfully.',
    ]);
}


public function edit($id){
    $category =Category::findOrFail($id);
    return response()->json($category);
}


public function update(Request $request,$id)
{

    $request->validate([
    'category_name' => 'required|min:3|max:100|unique:categories,category_name,' . $id,
    'slug'          => 'required|unique:categories,slug,' . $id,
    'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'status'        => 'required',
]);

    $category = Category::findOrFail($id);

    if($request->hasFile('image'))
    {

        if($category->image && file_exists(public_path($category->image)))
        {
            unlink(public_path($category->image));
        }

        $image = $request->file('image');

        $imageName=time().'.'.$image->extension();

        $image->move(public_path('uploads/category'),$imageName);

        $category->image = $imageName;;

    }

    $category->category_name=$request->category_name;
    $category->slug=$request->slug;
    $category->status=$request->status;

    $category->save();

    return response()->json([

        'status'=>true,
        'message'=>'Category Updated Successfully'

    ]);

}

public function destroy($id)
{

    $category=Category::findOrFail($id);

    // if($category->image && file_exists(public_path($category->image)))
    // {
    //     unlink(public_path($category->image));
    // }
    
    if ($category->image && file_exists(public_path('uploads/category/' . $category->image))) {
    unlink(public_path('uploads/category/' . $category->image));
    }

    $category->delete();

    return response()->json([

        'status'=>true,
        'message'=>'Category Deleted Successfully'

    ]);

}

//list the categrogy
public function getCategory(Request $request)
{
    if ($request->ajax()) {

        $categories = Category::latest()->get();

        return DataTables::of($categories)
            ->addIndexColumn()

            ->editColumn('image', function ($row) {

                if ($row->image) {
                    return '<img src="'.asset('uploads/category/'.$row->image).'" width="60">';
                }

                return '-';
            })

            ->editColumn('status', function ($row) {

                return $row->status
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })

            ->addColumn('action', function ($row) {

                return '
                    <button class="btn btn-sm btn-primary editBtn" data-id="'.$row->id.'">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <button class="btn btn-sm btn-danger deleteBtn" data-id="'.$row->id.'">
                        <i class="bi bi-trash"></i>
                    </button>
                ';
            })

            ->rawColumns(['image','status','action'])

            ->make(true);
    }
}

}
