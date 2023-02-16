@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 mt-5">
						@if($items)
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Заявки на обратную связь</h3>
							</div>

							<div class="card-body">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th style="width: 10px">№</th>
										<th>Тип</th>
										<th>Пользователь</th>
										<th>Телефон</th>
										<th>Почта</th>
										<th>Действия</th>
									</tr>
									</thead>
									<tbody>
									@foreach($items as $item)
									<tr class="{{hclass($item->checked ===1 , 'feedback_checked')}}feedback_item">
										<td>{{ $item->id }}</td>
										<td>{{ $item->feedbackType->title }}</td>
										<td>{{ $item->user_name }}</td>
										<td>{{ $item->user_phone }}</td>
										<td>{{ $item->user_email }}</td>
										<td class="d-flex justify-content-between">
											<a href="tel:{{ $item->user_phone }}">
												<i class="nav-icon fas fa-phone" style="color: black;
												font-size:25px"></i>
											</a>
											<div class="admin_action">
												<a href="{{ route('admin.checked', $item->id) }}"
												   class="admin_feedback_check">
													<i class="nav-icon fas fa-check-square" style="color: black;
												font-size:25px"></i>
												</a>
											</div>
											<a href="{{ route('admin.feedback.show', $item->id) }}">
												<i class="nav-icon fas fa-angle-down" style="color: black;
												font-size:25px"></i>
											</a>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix d-flex justify-content-center">{{ $items->links() }}</div>
						</div>
						@else
							<h1>Заявок на обратную связь нет</h1>
						@endif
					</div>
				</div>
			</div>
		</section>
	</div>

@endsection
