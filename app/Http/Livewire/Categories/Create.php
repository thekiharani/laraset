<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
	public $parents;
    public $sub_title;

	public $name;
	public $parent;
	public $description;

	public function mount() {
		$this->parents = Category::root()->get();
        $this->sub_title = 'New Category';
	}

    public function render()
    {
        return view('livewire.categories.create');
    }

    public function store() {
    	$data = $this->validate([
    		'name' => 'bail|required|string|unique:categories',
    		'parent' => 'bail|required',
    		'description' => 'bail|sometimes'
    	]);

    	Category::create([
    		'name' => $this->name,
    		'slug' => Str::slug($this->name, '-'),
    		'parent_id' => $this->parent,
    		'user_id' => Auth::id(),
    		'description' => $this->description,
    	]);

    	session()->flash('success', 'Category added successfully!');
    	// $this->reset();
    	return redirect()->route('blog.category.index');
    }
}
