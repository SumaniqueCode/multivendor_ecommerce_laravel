<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function sellerDashboard(){
        return view("Seller.sellerDashboard");
    }
}
