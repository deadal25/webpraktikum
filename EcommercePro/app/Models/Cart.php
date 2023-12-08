<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Cart extends Model
{

   // Di dalam model Cart
public function products()
{
    return $this->hasMany(Product::class, 'cart_id');
}

    
protected $fillable = ['user_id', 'product_id', 'quantity'];
// protected $fiillaable = ['user_id','product_id','quantity'];
}
