<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// The attributes that are mass assignable.
    protected $fillable = [
        'name', 'slug', 'user_id', 'parent_id', 'description',
    ];

    // A category belongs to a user
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

	// A parent category may have many children
	public function children() {
    	return $this->hasMany(Category::class, 'parent_id');
    }

    // A category may have many posts
    public function posts() {
    	return $this->hasMany(Post::class, 'post_id');
    }

     // A child category belongs to a parent
    public function parent() {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    // Parent categories
    public function scopeRoot($query){
        return $query->where('parent_id', 0);
    }

    // Parent categories
    public function scopeBranch($query){
        return $query->where('parent_id', '!=', 0);
    }

    // format response
    public function format() {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'author' => $this->author->name,
            'parent' => $this->parent->name ?? 'Parent Category',
            'date_created' => $this->created_at->diffForHumans(),
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }
}
