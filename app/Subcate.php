<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Product;

class Subcate extends Model
{
	protected $guarded =[];

    public function Category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function Product()
    {
    	return $this->hasMany(Product::class);
    }

    public function path()
    {
    	return url("/subcate/{$this->id}");
    }
}
