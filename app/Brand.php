<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Product;


class Brand extends Model
{
    protected $guarded = [];
    
    public function Product()
    {
    	return $this->hasMany(Product::class);
    }

    public function path()
    {
    	return url("/brand/{$this->id}");
    }
    

}
