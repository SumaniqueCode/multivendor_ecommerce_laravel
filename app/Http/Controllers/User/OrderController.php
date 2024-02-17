<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Seller\Product;
use App\Models\Seller\productVariation;
use App\Models\User;
use App\Models\User\Cart;
use App\Models\User\DeliveryAddress;
use App\Models\User\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function viewOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $quantity = $request->quantity;
            $deliveryAddress = DeliveryAddress::where('user_id', auth()->user()->id)->get();
            $carts = [];
            if ($request->product_variation_id) {
                $productVariation = ProductVariation::find($request->product_variation_id);
                if ($quantity > $productVariation->stock) {
                    return back()->withErrors(["quantity" => "Insufficient product in stock"]);
                } else {
                    $old_cart = Cart::where('product_variation_id', $request->product_variation_id)->where('user_id', auth()->user()->id)->exists();
                    if ($old_cart) {
                        $cart = Cart::where('product_variation_id', $request->product_variation_id)->where('user_id', auth()->user()->id)->first();
                        $cart->update([
                            'quantity' => $quantity,
                        ]);
                        $carts[] = $cart;
                    } else {
                        $cart = Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_variation_id' => $request->product_variation_id,
                            'quantity' => $quantity,
                        ]);
                        $carts[] = $cart;
                    }
                }
                return view('User.checkout', compact('carts', 'deliveryAddress'));
            }
            if ($request->cart_id) {
                $cart = Cart::where('id', $request->cart_id)->first();
                $carts[] = $cart;
            }
            return view('User.checkout', compact('carts', 'deliveryAddress'));
        }
    }
    public function checkOutOrder(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'payment_method' => 'required',
            'delivery_address_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            // if($request->payment=="Khalti"){
            //     $curl = curl_init();
            //     curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'POST',
            //     CURLOPT_POSTFIELDS =>'{
            //     "return_url": "http://example.com/",
            //     "website_url": "https://example.com/",
            //     "amount": "1000",
            //     "purchase_order_id": "Order01",
            //         "purchase_order_name": "test",
            
            //     "customer_info": {
            //         "name": "Test Bahadur",
            //         "email": "test@khalti.com",
            //         "phone": "9800000001"
            //     }
            //     }
            
            //     ',
            //     CURLOPT_HTTPHEADER => array(
            //         'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
            //         'Content-Type: application/json',
            //     ),
            //     ));
            
            //     $response = curl_exec($curl);
            
            //     curl_close($curl);
            //     echo $response;
            // }
            $carts = json_decode($request->carts);
            foreach ($carts as $cart) {
                $productVariation = ProductVariation::where('id',  $cart->product_variation_id)->first();
                Order::create([
                    'user_id' => auth()->user()->id,
                    'quantity' => $cart->quantity,
                    'product_variation_id' => $productVariation->id,
                    'price_per_item'=>$productVariation->price,
                    'total_price'=>$productVariation->price* $cart->quantity,
                    'delivery_address_id' => $request->delivery_address_id,
                    'seller_id' => $productVariation->product->user_id,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                    'payment_method' => $request->payment_method,
                ]);
                $newProductQuantity = $productVariation->stock - $cart->quantity;
                Cart::find($cart->id)->delete();
                $productVariation->update([
                    'stock' => $newProductQuantity,
                ]);

                //send order confirmation mail
                $user = auth()->user();
                // Mail::send(
                //     "Mails.OrderMails.PurchaseMail",
                //     compact('productVariation', 'cart'),
                //     function ($message) use ($user) {
                //         $message->to($user->email);
                //         $message->subject("Product Purchase Confirmation");
                //     }
                // );
            }
        }
        return redirect("/orders")->with(['success' => 'Order placed successfully']);
    }
    public function getOrders()
    {
        $user = auth()->user();
        if ($user->role == 'User') {
            $orders = Order::where('user_id', $user->id)->where('status', "!=", "Cancelled")->latest()->get();
            $CancelledOrders = Order::where('user_id', $user->id)->where('status', "Cancelled")->get();
            return view('User.orders', compact('orders'));
        } elseif ($user->role == 'Seller') {
            $orders = Order::where('seller_id', $user->id)->where('status', "!=", "Cancelled")->latest()->get();
            $CancelledOrders = Order::where('seller_id', $user->id)->where('status', "Cancelled")->get();
            return view('Seller.orders', compact('orders'));
        }
    }
    public function getOrderDetails($id)
    {
        $orders = Order::where('user_id', $id)->first();
        $user = auth()->user();
        if ($user->role == 'User') {
            return view('User.orders', compact('orders'));
        } elseif ($user->role == 'Seller') {
            return view('Seller.orders', compact('orders'));
        }
    }
    public function editOrder(Request $request)
    {
        $order = Order::where('id', $request->id)->first();
        $order->update([
            'status' => $request->status,
        ]);

        $user = User::where('id', $order->user_id)->first();
        $productVariation = productVariation::where('id', $order->product_variation_id)->first();
        Mail::send(
            "Mails.OrderMails.OrderStatusMail",
            compact('order', 'user', 'productVariation'),
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject("Product Status Info");
            }
        );
        return response()->json(['success' => 'order Updated successfully', 'order' => $order]);
    }
    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->status == "Processing" || $order->status == "Pending") {
            $productVariation = productVariation::where('id', $order->product_variation_id)->first();
            $productVariation->update([
                'stock' => $productVariation->stock + $order->quantity,
            ]);
            $order->update([
                'status' => 'Cancelled'
            ]);
            return back()->with(['success' => 'Order Cancelled Successfully'], $order);
        } else {
            return back()->with(['error' => 'Order cannot be cancelled once it is shipped.']);
        }
    }

    public function checkout()
    {
        return view('User.checkout');
    }
}
