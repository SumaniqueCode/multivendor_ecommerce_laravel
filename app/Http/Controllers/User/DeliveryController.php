<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\DeliveryAddress;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function addAddress(Request $request){
        $deliveryAddress = DeliveryAddress::create([
            'user_id' => auth()->user()->id,
            'full_name' => $request->full_name,
           'phone' =>$request->phone,
            'delivery_point' =>$request->delivery_point,
            'address' =>$request->address,
            'landmark' =>$request->landmark,
        ]);
        return back()->with(['success',"Delivery Address Added Successfully" ,'deliveryAddress', $deliveryAddress]);
    }

    public function editAddress(Request $request){
        $deliveryAddress = DeliveryAddress::where('id', $request->id)->first();
        $deliveryAddress->update([
            'full_name' => $request->name,
           'phone' =>$request->phone,
            'delivery_point' =>$request->delivery_point,
            'address' =>$request->address,
            'landmark' =>$request->landmark,
        ]);
        return back()->with(['success',"Delivery Address Added Successfully" ,'deliveryAddress', $deliveryAddress]);
    }

    public function deleteAddress($id){
        $deliveryAddress = DeliveryAddress::where('id', $id)->first();
        $deliveryAddress->delete();
        return back()->with(['success',"Delivery Address Deleted Successfully" ,'deliveryAddress', $deliveryAddress]);
    }
}
