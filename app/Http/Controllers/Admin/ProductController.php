<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.product.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required|exists:categories,id',

            'product_name' => 'required|min:3|max:255',

            'slug' => 'required|unique:products,slug',

            'sku' => 'required|unique:products,sku',

            'short_description' => 'required|max:255',

            'description' => 'required',

            'price' => 'required|numeric|min:1',

            'sale_price' => 'nullable|numeric',

            'qty' => 'required|integer|min:0',

            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'is_featured' => 'required|boolean',

            'status' => 'required|boolean',

        ]);

        DB::beginTransaction();

        try {

            $thumbnailName = null;

            if ($request->hasFile('thumbnail')) {

                $file = $request->file('thumbnail');

                $thumbnailName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads/products'), $thumbnailName);
            }

            $product = Product::create([

                'category_id' => $request->category_id,

                'product_name' => $request->product_name,

                'slug' => $request->slug,

                'sku' => $request->sku,

                'short_description' => $request->short_description,

                'description' => $request->description,

                'price' => $request->price,

                'sale_price' => $request->sale_price,

                'qty' => $request->qty,

                'thumbnail' => $thumbnailName,

                'is_featured' => $request->is_featured,

                'status' => $request->status,

            ]);

            // if ($request->hasFile('images')) {

            //     foreach ($request->file('images') as $image) {

            //         $imageName = time() . rand(100,999) . '.' . $image->getClientOriginalExtension();

            //         $image->move(public_path('uploads/products/gallery'), $imageName);

            //         ProductImage::create([

            //             'product_id' => $product->id,

            //             'image'      => $imageName

            //         ]);
            //     }
            // }

            DB::commit();

            return response()->json([

                'status' => true,

                'message' => 'Product Added Successfully.'

            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([

                'status' => false,

                'message' => $e->getMessage()

            ], 500);

        }
    }

    //edit 
    public function edit($id)
{
    $product = Product::with('images')->findOrFail($id);

    return response()->json([
        'status' => true,
        'product' => $product
    ]);
}

public function update(Request $request,$id)
{

    $product=Product::findOrFail($id);

    $request->validate([

        'category_id'=>'required',

        'product_name'=>'required',

        'slug'=>'required|unique:products,slug,'.$id,

        'sku'=>'required|unique:products,sku,'.$id,

        'price'=>'required',

        'qty'=>'required',

    ]);

    if($request->hasFile('thumbnail')){

        if($product->thumbnail &&
            file_exists(public_path('uploads/products/'.$product->thumbnail))){

            unlink(public_path('uploads/products/'.$product->thumbnail));

        }

        $file=$request->file('thumbnail');

        $filename=time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('uploads/products'),$filename);

        $product->thumbnail=$filename;

    }

    $product->category_id=$request->category_id;

    $product->product_name=$request->product_name;

    $product->slug=$request->slug;

    $product->sku=$request->sku;

    $product->short_description=$request->short_description;

    $product->description=$request->description;

    $product->price=$request->price;

    $product->sale_price=$request->sale_price;

    $product->qty=$request->qty;

    $product->is_featured=$request->is_featured;

    $product->status=$request->status;

    $product->save();

    return response()->json([

        'status'=>true,

        'message'=>'Product Updated Successfully'

    ]);

}


   
public function getProducts(Request $request)
{
    if ($request->ajax()) {

        $products = Product::with('category')->latest();

        return DataTables::of($products)

            ->addIndexColumn()

            ->addColumn('thumbnail', function ($row) {

                if ($row->thumbnail) {

                    return '<img src="'.asset('uploads/products/'.$row->thumbnail).'"
                                width="60"
                                height="60"
                                class="rounded border">';
                }

                return '-';
            })

            ->addColumn('category', function ($row) {

                return $row->category->category_name ?? '-';

            })

            ->addColumn('featured', function ($row) {

                if ($row->is_featured) {

                    return '<span class="badge bg-success">Yes</span>';
                }

                return '<span class="badge bg-secondary">No</span>';

            })

            ->addColumn('status', function ($row) {

                if ($row->status) {

                    return '<span class="badge bg-success">Active</span>';
                }

                return '<span class="badge bg-danger">Inactive</span>';

            })

            ->addColumn('action', function ($row) {

                return '

                <button class="btn btn-sm btn-primary editBtn"
                    data-id="'.$row->id.'">
                    <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-sm btn-danger deleteBtn"
                    data-id="'.$row->id.'">
                    <i class="fa fa-trash"></i>
                </button>

                ';

            })

            ->rawColumns([
                'thumbnail',
                'featured',
                'status',
                'action'
            ])

            ->make(true);
    }
}












}
