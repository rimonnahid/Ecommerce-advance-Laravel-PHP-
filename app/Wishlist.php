<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Wishlist extends Model
{
	protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function Product()
    {
    	return $this->belongsTo(Product::class);
    }
}
