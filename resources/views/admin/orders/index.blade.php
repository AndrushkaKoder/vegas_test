@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 mt-5">
						@if($orders)
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Список заказов</h3>
							</div>

							<div class="card-body">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th style="width: 10px">№</th>
										<th>Название</th>
										<th>Заказчик</th>
										<th>Телефон</th>
										<th>Почта</th>
									</tr>
									</thead>
									<tbody>
									@foreach($orders as $item)
									<tr>
										<td>{{ $item->id }}</td>
										<td>{{ $item->user_data->value ?? "" }}</td>
										<td>{{ $item->user_name }}</td>
										<td>{{ $item->user_phone }}</td>
										<td>{{ $item->user_email }}</td>

									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix d-flex justify-content-center">{{ $orders->links() }}</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</section>
	</div>

@endsection
