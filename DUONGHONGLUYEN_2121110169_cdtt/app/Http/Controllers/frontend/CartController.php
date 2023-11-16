<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('frontend.cart');
    }

    public function addCart(Request $request)
    {
        $productid = $request->productid;
        $qty = $request->qty;
        $count_cart = 10;
        return response()->json(['count_cart'=>$count_cart]);
    }
}
