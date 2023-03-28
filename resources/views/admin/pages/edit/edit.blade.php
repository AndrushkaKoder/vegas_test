@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-3">
						<a href="{{ route('admin.pages.index')}}">
							Вернуться
						</a>
					</div>
					<div class="col-12 text-center">
						<h1>{{ $item->title ?? 'Новая страница' }}</h1>
					</div>

					@include('admin.pages.edit._elements')

				</div>
			</div>
		</section>
	</div>

@endsection
