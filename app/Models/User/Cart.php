<?php

namespace App\Models\User;

use App\Models\Seller\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function product(){
        $this->belongsToMany(Product::class);
    }
}
