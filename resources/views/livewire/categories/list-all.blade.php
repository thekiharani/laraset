@section('title', $sub_title)

<div class="container">
	<div class="text-right mb-2">
		<a href="{{ route('blog.category.create') }}" class="btn btn-primary">New Category</a>
	</div>

	@if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
	<div class="card">
		<div class="card-header h3 text-center">{{ $sub_title }}</div>
		<div class="card-body">
			<table class="table table-sm table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Author</th>
						<th>Parent</th>
						<th>Date Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					 @forelse ($categories as $category)
				    	<tr>
				    		<td>{{ $category['name'] }}</td>
				    		<td>{{ $category['author'] }}</td>
				    		<td>{{ $category['parent'] }}</td>
				    		<td>{{ $category['date_created'] }}</td>
				    		<td>
				    			<a href="{{ route('blog.category.show', [$category['slug'], $category['id']]) }}" class="btn btn-success">View</a>
				    			<a href="{{ route('blog.category.edit', $category['id']) }}" class="btn btn-primary">Edit</a>
				    		</td>
				    	</tr>
				    @empty
				    <tr>
				    	<td colspan="5" class="text-danger">No categories found...</td>
				    </tr>
				    @endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
