@section('title', $sub_title)

<div class="container">
	<div class="card">
		<p class="card-header text-center h3">{{ $sub_title }}</p>
		<div class="card-body">

			<form wire:submit.prevent="update">

		    	@if (session('success'))
	                <div class="alert alert-success" role="alert">
	                    {{ session('success') }}
	                </div>
	            @endif
		    	
		    	<div class="form-group">
		    		<label for="title">Post Title</label>
		    		<input wire:model.lazy="title" class="form-control" placeholder="Post title...">

		    		@error('title')
	                    <span class="text-danger" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		    	</div>

		    	<div class="form-group">
		    		<label for="category">Post Category</label>
		    		<select wire:model="category" class="form-control">
		    			<option>-- Select category --</option>
		    			@foreach ($categories as $category)
		    				<option value="{{ $category->id }}">{{ $category->name }} ({{ $category->parent->name }})</option>
		    			@endforeach
		    		</select>

		    		@error('category')
	                    <span class="text-danger" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		    	</div>

		    	<div class="form-group">
		    		<label for="body">Post Body</label>
		    		<textarea wire:model.lazy="body" class="form-control" placeholder="Post body..." rows="6"></textarea>

		    		@error('body')
	                    <span class="text-danger" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
		    	</div>

		    	<div class="form-group text-right">
		    		<a href="/" class="btn btn-secondary">Cancel</a>
		    		<button type="submit" wire:target="update"wire:loading.attr="disabled" class="btn btn-primary">
		    			<span wire:target="update" wire:loading.remove>Save</span>
		    			<span wire:target="update" wire:loading>Saving... Please wait</span>
		    		</button>
		    	</div>

		    </form>
	    </div>
	</div>
</div>
