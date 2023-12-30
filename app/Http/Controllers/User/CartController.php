<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        if($cart->product_id == $id)
        {
            $cart->increment('quantity');
            return back()->with('success', 'cart added successfully');
        }
        else{
        $new_cart = New Cart;
        $new_cart->create([
            'user_id' => auth()->user()->id,
            'product_id'=>$id,
            'quantity'=>1,
        ]);

        return back()->with('success', 'cart added successfully');
    }
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)->first();
        $cart->update(['quantity' => $request->quantity]);
        return back()->with('success', 'cart updated successfully');
    }

    public function removeCart($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->delete();

        return back()->with('success', 'cart deleted successfully');
    }

    public function viewCart(){
        $carts=Cart::where('user_id',auth()->user()->id)->get();
        return view('User.cart')->with('carts',$carts);
    }
}
