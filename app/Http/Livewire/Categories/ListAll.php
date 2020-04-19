<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class ListAll extends Component
{
	public $categories;
	public $sub_title;

	public function mount() {
		$this->categories = Category::all()->map->format()->toArray();
		$this->sub_title = 'All Categories';
	}

    public function render()
    {
    	// dd($this->categories);
        return view('livewire.categories.list-all');
    }
}
