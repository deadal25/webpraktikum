<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
   
    // Di model Product
public function store()
{
    return $this->belongsTo(Store::class);
}
// Di dalam model Product
// Di dalam model Product
public function cart()
{
    return $this->belongsTo(Cart::class, 'cart_id');
}




}
