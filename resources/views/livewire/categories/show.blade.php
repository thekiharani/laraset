@section('title', $sub_title)

<div class="container">
	<div class="card">
		<div class="card-header h3 text-center">{{ $sub_title }}</div>
		<div class="card-body">
			<p class="h4">{{ $category['parent'] }}</p>
			<p>{{ $category['description'] }}</p>
		</div>
	</div>
</div>

