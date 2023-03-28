@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h1>Производители</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12 mb-3">
						<a href="{{ route('admin.vendors.create') }}" class="btn btn-success">Добавить производителя</a>
					</div>
				</div>

				<div class="row">
					<div class="col-12">

						@include('admin.vendors.index.table._elements')

					</div>
					<div class="col-12 d-flex justify-content-center">
						{{ $items->appends(request()->all())->links()}}
					</div>
				</div>

			</div>
		</section>
	</div>
@endsection
