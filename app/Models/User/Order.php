<?php

namespace App\Models\User;

use App\Models\Seller\productVariation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'seller_id',
        'product_variation_id',
        'delivery_address_id',
        'quantity',
        'status',
        'payment_status',
        'payment_method',
        'price_per_item',
        'total_price'
        ];

        public function productVariation(){
            return $this->belongsTo(productVariation::class);
        }
}
