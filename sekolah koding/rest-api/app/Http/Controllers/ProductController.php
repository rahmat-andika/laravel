<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function get()
    {
        return response()->json([
            'message' => 'Method GET successful',
        ]);
    }

    public function post(Request $request)
    {
        $product = new Product;
        $product->name = $request->name; 
        $product->price = $request->price; 
        $product->quantity = $request->quantity; 
        $product->active = $request->active;

        $product->save();

        return response()->json([
            'message' => 'successful',
            'data' => $product
        ]);
    }

    public function put(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name ? $request->name : $product->name; 
        $product->price = $request->price ? $request->price : $product->price; 
        $product->quantity = $request->quantity ? $request->quantity : $product->quantity; 
        $product->active = $request->active ? $request->active : $product->active;

        $product->save();

        return response()->json([
            'message' => 'successful ',
            'data' => $product
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'message' => 'successful',
            'data' => $product
        ]);
    }
}
