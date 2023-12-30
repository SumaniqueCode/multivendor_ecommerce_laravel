<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function addOrder(Request $request){
        
    }
    public function getOrder(){
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('User.orders', compact('orders'));
        
    }
    public function editOrder(Request $request){
        
    }
    public function cancelOrder($id){
        
    }

}
