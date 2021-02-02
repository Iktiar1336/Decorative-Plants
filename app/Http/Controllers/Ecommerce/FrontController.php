<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(3);
        $carts = json_decode(request()->cookie('dw-carts'), true);
        return view('ecommerce.index', compact('products','carts'));
    }

    public function show($slug)
    {
        $product = Product::with(['category'])->where('slug', $slug)->first();
        return view('ecommerce.show', compact('product'));
    }
}
