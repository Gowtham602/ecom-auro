<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function index()
{
    $categories = Category::where('status',1)->get();

    $products = Product::where('status',1)
                    ->latest()
                    ->get();

    return view('frontend.home',compact('categories','products'));
}




}
