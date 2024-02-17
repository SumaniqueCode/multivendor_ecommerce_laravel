<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Seller\ProductVariation;
use App\Models\User\Cart;
use App\Models\User\DeliveryAddress;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request,)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('product_variation_id', $request->id)->first();
        $productVariation = ProductVariation::where('id', $request->id)->first();
        if ($request->quantity == "") {
            $quantity = 1;
        } else {
            $quantity = $request->quantity;
        }
        if ($cart) {
            $totalQuantity = $quantity + $cart->quantity;
            if ($totalQuantity > $productVariation->stock) {
                return back()->withErrors(["quantity" => "Insufficient product in stock"]);
            } else {
                $cart->update([
                    $cart->quantity = $totalQuantity,
                ]);
                return back()->with('success', 'cart added successfully');
            }
        } else {
            if ($quantity > $productVariation->stock) {
                return back()->withErrors(["quantity" => "Insufficient product in stock"]);
            } else {
                $new_cart = new Cart;
                $new_cart->create([
                    'user_id' => auth()->user()->id,
                    'product_variation_id' => $request->id,
                    'quantity' => $quantity,
                ]);

                return back()->with('success', 'cart added successfully');
            }
        }
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)->first();
        $productVariation = ProductVariation::where('id', $cart->product_variation_id)->first();
        if ($request->quantity == "") {
            $quantity = 1;
        } else {
            $quantity = $request->quantity;
        }
        if ($quantity > $productVariation->stock) {
            return response()->json(['message' => 'Cart Quantity Exceed the product quantity'], 422);
        } else {
            $cart->update(['quantity' => $quantity]);
            // return back()->with('success', 'cart updated successfully');
            return response()->json(['message' => 'Quantity updated successfully', 'cart' => $cart], 201);
        }
    }

    public function removeCart($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->delete();

        return back()->with('success', 'cart deleted successfully');
    }

    public function viewCart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('User.cart')->with('carts', $carts);
    }

    public function checkoutCart(Request $request)
    {
        $deliveryAddress = DeliveryAddress::where('user_id', auth()->user()->id)->get();
        $cartIds = $request->cart_ids;
        $stringData = $cartIds[0];
        $arrayData = explode(',', $stringData);
        $arrayData = array_map('intval', $arrayData);
        $carts = [];
        foreach ($arrayData as $cartId) {
            $cart  = Cart::where('id', $cartId)->first();
            $carts[] = $cart;
        }
        return view('User.checkout')->with(['carts' => $carts, 'deliveryAddress' => $deliveryAddress]);
    }
}
