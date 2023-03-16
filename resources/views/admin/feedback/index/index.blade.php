@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row justify-content-between">
					<div class="col-12 d-flex justify-content-center">
						@if(!empty($pageName))
							@foreach($pageName as $item)
								@foreach($item as $value)
									{{--									<h1>{{ $value->title }}@if(count($pageName) > 1) &nbsp; | &nbsp;@endif </h1>--}}
								@endforeach
							@endforeach
						@else
							<h1>Заявки на обратную связь</h1>
						@endif
					</div>
				</div>

				<div class="row">

					<div class="col-lg-9 col-md-12">
						<div class="card-body">
							@if($items->count())
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
										<tr class="{{ hclass($item->checked, 'feedback_checked') }} feedback_item">
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

												@include('admin.elements._btn_toggle_checked', [
													'route' => 'admin.feedback.toggle_param',
													'item' => $item,
													'class' => 'admin_feedback_check',
												])

												<a href="{{ route('admin.feedback.show', $item->id) }}"
												   class="admin_feedback_show">
													<i class="nav-icon fas fa-angle-down" style="color: black;
												font-size:25px"></i>
												</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							@else
								<h1>Не найдено позиций по вашему запросу</h1>
							@endif
						</div>
					</div>

					<div class="col-lg-3 col-md-12">

						@include('admin.elements.filter')

					</div>
					<hr>

				</div>

				<div class="row">
					<div class="col-12 mb-3">
						<div class="card-footer clearfix d-flex justify-content-center">
							{{ $items->appends(request()->all())->links()}}
						</div>
					</div>
				</div>


			</div>
		</section>
	</div>
@endsection
