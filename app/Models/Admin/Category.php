<?php

namespace App\Models\Admin;

use App\Models\User\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'category_name',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
