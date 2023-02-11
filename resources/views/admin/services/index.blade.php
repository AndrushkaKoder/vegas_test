@extends('admin.layout.template')


@section('content')

	@if(!empty(session('success')))
		<div class="alert alert-success admin_create_alert" role="alert">
			{{ session('success') }}
		</div>
	@endif

	<div class="content-wrapper">

		<section class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-6 mt-5">
						<a href="{{ route('admin.services.create') }}" class="btn btn-success" style="border-radius:
						20px">Создать сервис</a>
					</div>
				</div>
				<div class="row">

					@if(!empty($services))
						<div class="col-12 mt-5">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Сервисы</h3>
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
										<tr>
											<th style="width: 10px">id</th>
											<th>Название</th>
											<th>Короткое описание</th>
											<th style="width: 45%">Полное описание</th>
											<th style="width: 150px">Дата создания</th>
											<th style="width: 100px">Действия</th>
										</tr>
										</thead>
										<tbody>
										@foreach($services as $item)
											<tr>
												<td>{{ $item->id }}</td>
												<td>{{ $item->title }}</td>
												<td>{{ $item->short_content }}</td>
												<td>{{ $item->content }}</td>
												<td>{{ $item->created_at }}</td>
												<td>
													<div class="admin_action d-flex justify-content-around">
														<a href="{{ route('admin.services.edit', $item->id) }}">
															<i class="nav-icon fas fa-pen"></i>
														</a>
														<a href="{{ route('admin.services.destroy', $item->id) }}">
															<i class="nav-icon fas fa-trash"></i>
														</a>
													</div>

												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
								<div class="card-footer clearfix d-flex justify-content-center">
									{{ $services->links() }}
								</div>

								@else
									<div class="col-12">
										<h1>Сервисов пока что нет, срочно добавьте</h1>
									</div>
							</div>
						</div>
					@endif
				</div>
			</div>
		</section>

@endsection
