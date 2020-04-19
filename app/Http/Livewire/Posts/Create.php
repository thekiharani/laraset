<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
	public $categories;
    public $sub_title;

	public $title;
	public $category;
	public $body;

	public function mount() {
		$this->categories = Category::with('parent')->branch()->get();
        $this->sub_title = 'New Post';
	}

    public function render()
    {
        return view('livewire.posts.create');
    }

    public function store() {
    	$data = $this->validate([
    		'title' => 'bail|required|string|unique:posts',
    		'category' => 'bail|required',
    		'body' => 'bail|required'
    	]);

    	Post::create([
    		'title' => $this->title,
    		'slug' => Str::slug($this->title, '-'),
    		'category_id' => $this->category,
    		'user_id' => Auth::id(),
    		'body' => $this->body,
    	]);

    	session()->flash('success', 'Post added successfully!');
    	// $this->reset();
    	return redirect()->route('blog.post.index');
    }
}
