<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Postcategory;

class Post extends Model
{
    protected $guarded =[];

    public function Postcategory()
    {
    	return $this->belongsTo(Postcategory::class);
    }
}
