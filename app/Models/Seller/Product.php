<?php

namespace App\Models\Seller;

use App\Models\Admin\Category;
use App\Models\DiscountVoucher;
use App\Models\Seller\productVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'product_name',
        'category_id',
        'product_description',
        'product_price',
        'product_color',
        'product_brand',
        'product_model',
        'stock',
        'origin_country',
        'product_image',
        'seller_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productVariation(){
        return $this->hasMany(productVariation::class);
    }

    public function discountVoucher(){
        return $this->hasMany(DiscountVoucher::class);
    }
}
