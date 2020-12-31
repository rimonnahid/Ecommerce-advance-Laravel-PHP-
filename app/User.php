<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Userdetail;
use App\Product;
use App\Wishlist;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email', 'image','password', 'provider', 'provider_id'
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Userdetail()
    {
        return $this->hasOne(Userdetail::class);
    }

    public function Product()
    {
        return $this->hasOne(Product::class);
    }

    public function Wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
