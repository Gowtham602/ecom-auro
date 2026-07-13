<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
 public function categoryProducts($slug)
{
    $category = Category::where('slug',$slug)->firstOrFail();

    $products = Product::where('category_id',$category->id)
                ->where('status',1)
                ->get();

    return view('frontend.category.index', compact('category','products'));
}

public function productDetails($slug)
{
    $product = Product::with('images','category')
                ->where('slug',$slug)
                ->firstOrFail();

    return view('frontend.product.details', compact('product'));
}
}
