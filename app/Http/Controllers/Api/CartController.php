<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user-id', Auth::id())->with('project')->get();
        return response()->json([
            'status'=>200,
            'carts'=>$carts,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request -> validate([
            'product_id'=> 'required',
            'qty'=> 'required'
        ]);

        Cart::create($data);
        return response()->json([
            'status'=> 200,
            'message'=>'Product  added to cart successfully',
        ]);
    }
}
