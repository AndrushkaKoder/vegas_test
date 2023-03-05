@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h1>Услуги</h1>
					</div>
				</div>

				<div class="row">
					<div class="col-12 mb-3">
						<a href="{{ route('admin.services.create') }}" class="btn btn-success">Новая услуга</a>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="cf nestable-lists">
							<div class="dd services_nestable" data-send="{{ route('admin.services.structure') }}">
								@include('admin.services.index.table._table', [$items])
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
	</div>
@endsection


