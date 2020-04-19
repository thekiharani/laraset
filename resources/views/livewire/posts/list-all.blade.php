@section('title', $sub_title)

<div class="container">
	<div class="text-right mb-2">
		<a href="{{ route('blog.post.create') }}" class="btn btn-primary">New Post</a>
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
						<th>Title</th>
						<th>Author</th>
						<th>Category</th>
						<th>Date Published</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					 @forelse ($posts as $post)
				    	<tr>
				    		<td>{{ $post->title }}</td>
				    		<td>{{ $post->author->name }}</td>
				    		<td>{{ $post->category->name }}</td>
				    		<td>{{ $post->created_at->format('jS F, Y | g:i A') }}</td>
				    		<td>
				    			<a href="{{ route('blog.post.show', [$post->slug, $post->id]) }}" class="btn btn-success">View</a>
				    			<a href="{{ route('blog.post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
				    		</td>
				    	</tr>
				    @empty
				    <tr>
				    	<td colspan="5" class="text-danger">No posts found...</td>
				    </tr>
				    @endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
