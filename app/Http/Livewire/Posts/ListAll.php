<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class ListAll extends Component
{
	public $posts;
	public $sub_title;

	public function mount() {
		$this->posts = Post::with(['author', 'category'])->get();
		$this->sub_title = 'All Posts';
	}
	
    public function render()
    {
        return view('livewire.posts.list-all');
    }
}
