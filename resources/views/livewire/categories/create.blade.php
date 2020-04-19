@section('title', $sub_title)

<div class="container">
	<div class="card">
		<p class="card-header text-center h3">{{ $sub_title }}</p>
		<div class="card-body">

			<form wire:submit.prevent="store">

		    	@if (session('success'))
	                <div class="alert alert-success" role="alert">
	                    {{ session('success') }}
	                </div>
	            @endif
		    	
		    	<div class="form-group">
		    		<label for="name">Category Name</label>
		    		<input wire:model.lazy="name" class="form-control" placeholder="Category name...">

		    		@error('name')
	                    <span class="text-danger" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		    	</div>

		    	<div class="form-group">
		    		<label for="parent">Parent Category</label>
		    		<select wire:model="parent" class="form-control">
		    			<option>{{ _('-- Select parent category --') }}</option>
		    			<option value="{{ 0 }}">{{ _('Parent Category') }}</option>
		    			@foreach ($parents as $parent)
		    				<option value="{{ $parent->id }}">{{ $parent->name }}</option>
		    			@endforeach
		    		</select>

		    		@error('parent')
	                    <span class="text-danger" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		    	</div>

		    	<div class="form-group">
		    		<label for="description">Category Description</label>
		    		<textarea wire:model.lazy="description" class="form-control" placeholder="Category description..." rows="6"></textarea>

		    		@error('description')
	                    <span class="text-danger" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		    	</div>

		    	<div class="form-group text-right">
		    		<a href="/" class="btn btn-secondary">Cancel</a>
		    		<button type="submit" wire:target="store"wire:loading.attr="disabled" class="btn btn-primary">
		    			<span wire:target="store" wire:loading.remove>Save</span>
		    			<span wire:target="store" wire:loading>Saving... Please wait</span>
		    		</button>
		    	</div>

		    </form>
	    </div>
	</div>
</div>
