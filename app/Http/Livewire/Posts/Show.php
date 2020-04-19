<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
	public $post;
	public $sub_title;
	
	public function mount($slug, Post $post) {
		$this->post = $post;
		$this->sub_title = $post->title;
	}

    public function render()
    {
        return view('livewire.posts.show');
    }
}
