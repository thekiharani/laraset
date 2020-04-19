<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
	public $parents;
    public $category;
    public $sub_title;

	public $name;
	public $parent;
	public $description;

	public function mount(Category $category) {
		$this->parents = Category::root()->get();
        $this->category = $category;
        $this->sub_title = 'Edit Category';

        $this->name = $category->name;
        $this->parent = $category->parent_id;
        $this->description = $category->description;
	}

    public function render()
    {
        return view('livewire.categories.edit');
    }

    public function update() {
    	$data = $this->validate([
    		'name' => 'bail|required|string',
    		'parent' => 'bail|required',
    		'description' => 'bail|sometimes'
    	]);

        $category = $this->category;
        $category->name = $this->name;
        $category->slug = Str::slug($this->name, '-');
        $category->parent_id = $this->parent;
        $category->description = $this->description;
        $category->save();

    	session()->flash('success', 'Category updated successfully!');
    	return redirect()->route('blog.category.index');
    }
}
