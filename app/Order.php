<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Orderdetail;

class Order extends Model
{
    protected $guarded =[];

    public function User()
    {
    	return $this->belongsTo(User::class);
    }

    public function Orderdetail()
    {
    	return $this->hasMany(Orderdetail::class);
    }
}
