<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class Orderdetail extends Model
{
    protected $guarded =[];

    public function Order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function Product()
    {
    	return $this->belongsTo(Product::class);
    }
}