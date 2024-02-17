<?php

namespace App\Models\Seller;

use App\Models\Admin\Category;
use App\Models\DiscountVoucher;
use App\Models\Seller\productVariation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =
    [
        'name',
        'category_id',
        'description',
        'brand',
        'model',
        'status',
        'origin',
        'user_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function productVariation(){
        return $this->hasMany(productVariation::class);
    }

    public function discountVoucher(){
        return $this->hasMany(DiscountVoucher::class);
    }
}
