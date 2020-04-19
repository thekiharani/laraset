<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	// The attributes that are mass assignable.
    protected $fillable = [
        'title', 'slug', 'user_id', 'category_id', 'body',
    ];

    // A post belongs to a author (user)
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // A post belongs to a category
    public function category() {
    	return $this->belongsTo(Category::class, 'category_id');
    }
}
