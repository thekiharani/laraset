<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
	public $categories;
    public $post;
    public $sub_title;

	public $title;
	public $category;
	public $body;

	public function mount(Post $post) {
        $this->categories = Category::with('parent')->branch()->get();
        $this->post = $post;
        $this->sub_title = 'Edit Post';

        $this->title = $post->title;
        $this->category = $post->category->id;
        $this->body = $post->body;
	}

    public function render()
    {
        return view('livewire.posts.edit');
    }

    public function update() {
    	$data = $this->validate([
    		'title' => 'bail|required|string',
    		'category' => 'bail|required',
    		'body' => 'bail|required'
    	]);

        $post = $this->post;
        $post->title = $this->title;
        $post->slug = Str::slug($this->title, '-');
        $post->category_id = $this->category;
        $post->body = $this->body;
        $post->save();

    	session()->flash('success', 'Post updated successfully!');
    	return redirect()->route('blog.post.index');
    }
}
