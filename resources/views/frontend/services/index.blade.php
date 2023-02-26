@extends('frontend.layout.template')

@section('content')

		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					@include('frontend.home._services')
				</div>
			</div>
		</div>

@endsection
