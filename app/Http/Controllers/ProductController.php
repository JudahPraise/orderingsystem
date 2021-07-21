<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        // dd($categories);
        return view('products', compact('categories'));
    }

    public function store(Request $request)
    {

        Product::create([
            'cat_id' => $request->cat_id,
            'product' => $request->product,
            'stocks' => $request->stocks,
            'price' => $request->price
        ]);

        return redirect()->route('product.index');

    }
}
