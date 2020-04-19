<div class="card">
	<p class="card-header text-center h3">Contact Us</p>
	<div class="card-body">
	    <form wire:submit.prevent="submit">

	    	@if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
	    	
	    	<div class="form-group">
	    		<label for="name">Name</label>
	    		<input wire:model.lazy="name" class="form-control" placeholder="Your name...">

	    		@error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>

	    	<div class="form-group">
	    		<label for="email">Email</label>
	    		<input wire:model.lazy="email" class="form-control" placeholder="Your email address...">

	    		@error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>

	    	<div class="form-group">
	    		<label for="region">Region</label>
	    		<select wire:model="region" class="form-control">
	    			<option>-- Select region --</option>
	    			<option value="nbo">Nairobi</option>
	    			<option value="mke">Mt. Kenya East</option>
	    			<option value="ctl">Central</option>
	    		</select>

	    		@error('region')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>

	    	<div class="form-group">
	    		<label for="message">Message</label>
	    		<textarea wire:model.lazy="message" class="form-control" placeholder="Your message..."></textarea>

	    		@error('message')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	    	</div>

	    	<div class="form-group text-right">
	    		<a href="/" class="btn btn-secondary">Cancel</a>
	    		<button type="submit" wire:target="submit"wire:loading.attr="disabled" class="btn btn-primary">
	    			<span wire:target="submit" wire:loading.remove>Send</span>
	    			<span wire:target="submit" wire:loading>Please Wait...</span>
	    		</button>
	    	</div>

	    </form>
    </div>
</div>
