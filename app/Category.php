<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcate;
use App\Product;

class Category extends Model
{
    protected $guarded = [];

    public function Product()
    {
    	return $this->hasMany(Product::class);
    }

    public function Subcate()
    {
    	return $this->hasMany(Subcate::class);
    }

    public function path()
    {
    	return url("/category/{$this->id}");
    }
    


}
