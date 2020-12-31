<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Subcate;
use App\Brand;
use App\User;
use App\Wishlist;
use App\Orderdetail;
use Image;


class Product extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function Brand()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function Subcate()
    {
        return $this->belongsTo(Subcate::class);
    }


    public function Wishlist()
    {
        return $this->hasMany(Wishlist::class);

    }

    public function Orderdetail()
    {
        return $this->hasMany(Orderdetail::class);
    }
    
    public function path()
    {
        return url("/single_product/{$this->id}");
    }
    
}
