@section('title', $sub_title)

<div class="container">
    <div class="card">
    	<div class="card-header h3 text-center">{{ $sub_title }}</div>
    	<div class="card-body">
    		{!! Markdown::parse($post->body) !!}
    	</div>
    </div>
</div>
