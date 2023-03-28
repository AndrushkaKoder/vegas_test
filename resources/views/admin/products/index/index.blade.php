@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h1>Товары</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12 mb-3">
						<a href="{{ route('admin.products.create') }}" class="btn btn-success">Добавить продукт</a>
					</div>
				</div>

				<div class="row">
					<div class="col-12">

						@include('admin.products.index.table._elements')

					</div>
					<div class="col-12 d-flex justify-content-center">
						{{ $items->appends(request()->all())->links()}}
					</div>
				</div>

			</div>
		</section>
	</div>
@endsection
