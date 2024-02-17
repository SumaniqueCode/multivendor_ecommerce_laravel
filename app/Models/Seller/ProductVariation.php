<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'product_id',
        'price',
        'color',
        'stock',
        'size',
        'image',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
