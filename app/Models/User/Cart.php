<?php

namespace App\Models\User;

use App\Models\Seller\productVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_variation_id',
        'quantity',
    ];

    public function productVariation(){
        return $this->belongsTo(productVariation::class);
    }
}
