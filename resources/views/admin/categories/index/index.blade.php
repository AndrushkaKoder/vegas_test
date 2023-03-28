@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h1>Категории товаров</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12 mb-3">
						<a href="{{ route('admin.categories.create') }}" class="btn btn-success">Создать категорию</a>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="cf nestable-lists">
							<div class="dd nestable" data-send="{{ route('admin.categories.change_structure') }}">
								@include('admin.categories.index._elements', ['items' => $items])
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
	</div>
@endsection
