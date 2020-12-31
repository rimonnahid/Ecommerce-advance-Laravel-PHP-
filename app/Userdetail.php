<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Userdetail extends Model
{
	protected $guarded=[];


    public function User()
    {
    	return $this->belongsTo(User::class);
    }
}
