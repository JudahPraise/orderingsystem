<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('order', compact('categories'));
    }

    public function store(Request $request)
    {
        $order = [];

        foreach ($request->prd_name as $item => $key) {
            $order[] = ([
               'prd_id' => $request->prd_id[$item],
               'prd_name' => $request->prd_name[$item],
               'quantity' => $request->quantity[$item],
               'price' => $request->price[$item],
               'price_total' => $request->price[$item] * $request->quantity[$item]
            ]);
        }

        Order::insert($order);

        return redirect()->back()->with('success', 'Order Successfully sent!');
    }
}
