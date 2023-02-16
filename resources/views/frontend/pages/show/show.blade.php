@extends('frontend.layout.template')

@section('content')

	@if(!empty($page))

	<div class="container">
		<div class="row">
			<div class="col-12">
					<h1>{{ $page->title }}</h1>
			</div>
			<hr>
			<div class="col-12">
				{!! $page->content !!}
			</div>
		</div>
	</div>

	@endif

@endsection
