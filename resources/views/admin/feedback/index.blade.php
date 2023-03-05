@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row justify-content-between">
					<div class="col-12 d-flex justify-content-center">
						<h1>Заявки на обратную связь</h1>
					</div>
				</div>

				<div class="row">

					<div class="col-lg-8 col-md-12">
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
											<a href="{{ route('admin.feedback.checked', $item->id) }}"
											   class="admin_feedback_check"
											   data-checked="{{ $item->checked }}">
												<i class="nav-icon fas fa-check-square" style="color: black;
											font-size:25px"></i>
											</a>

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
						</div>
					</div>

					<div class="col-lg-4 col-md-12">
						<form action="{{ route('admin.feedback.index') }}" method="get" class="text-center">
{{--							@csrf--}}
							<p><strong>Фильтровать по категориям</strong></p>
							<div class="mt-3">
								<label for="filter_select" class="form-label">Категории:</label>

								<select name="category[]" id="filter_select" class="form-select" multiple="multiple">
									@foreach($feedbackType as $item)
									<option value="{{ $item->id }}">{{ $item->title }}</option>
									@endforeach
								</select>

							</div>
							<div class="mt-3 d-flex justify-content-between">
								<button type="submit" class="btn btn-success">Фильтровать</button>
								<a href="{{ route('admin.feedback.index') }}" class="btn btn-dark">Отмена</a>
							</div>
						</form>
					</div>
					<hr>

				</div>

				<div class="card-footer clearfix d-flex justify-content-center">{{ $items->links() }}</div>

			</div>
		</section>
	</div>
@endsection
