@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-6 mt-5">
						<a href="{{ route('admin.services.create') }}" class="btn btn-success">Новая услуга</a>
					</div>
				</div>

				<div class="row">
					@if($services->count())
						<div class="col-12 mt-5">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Сервисы</h3>
								</div>

								<div class="card-body">
									@include('admin.services._table')
								</div>

								<div class="card-footer clearfix d-flex justify-content-center">
									{{ $services->links() }}
								</div>
							</div>
						</div>
					@else
						<div class="col-12">
							<h1>Сервисов пока что нет, срочно добавьте</h1>
						</div>
					@endif
				</div>
			</div>
		</section>
	</div>

@endsection
