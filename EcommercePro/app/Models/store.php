<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Store;

// namespace App;


class store extends Model
{
    use HasFactory;
    protected $fillable = ['nama_store', 'description_store', 'address', 'phone', 'image_store'];
    // Di model Store
public function products()
{
    return $this->hasMany(Product::class);
}
public function user()
    {
        return $this->belongsTo(User::class);
    }


}
// $product = Product::with('store')->find($id);

