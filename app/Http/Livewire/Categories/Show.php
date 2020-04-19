<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Show extends Component
{
	public $category;
	public $sub_title;

	public function mount($slug, Category $category) {
		$this->category = $category->format();
		$this->sub_title = $category->name;
	}
	
    public function render()
    {
        return view('livewire.categories.show');
    }
}
