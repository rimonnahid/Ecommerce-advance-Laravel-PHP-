<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Postcategory extends Model
{
    protected $guarded = [];

    public function Post()
    {
    	return $this->hasMany(Post::class);
    }
}
