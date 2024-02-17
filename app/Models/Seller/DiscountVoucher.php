<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_rate',
        'discount_min_spend',
        'discount_max',
        'voucher_name',
        'voucher_discount',
        'voucher_min_spend',
        'voucher_max_discount',
        'validity_start',
        'validity_end'

    ];
}
