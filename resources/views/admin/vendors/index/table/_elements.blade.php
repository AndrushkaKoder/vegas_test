<div class="card-body" style="min-height: 400px">
	@if($items->count())
		<table class="table table-bordered">
			<thead>
			<tr>
				<th style="width: 10px">№</th>
				<th>Название</th>
				<th style="width: 30px;">Действия</th>
			</tr>
			</thead>
			<tbody>
			@foreach($items as $item)
				<tr style="text-align: center; @if($item->discount_price)background: yellow @endif">
					<td>{{ $item->id }}</td>
					<td>{{ $item->title }}</td>
					<td class="d-flex justify-content-between" style="border: none">
						<a href="{{ route('admin.vendors.edit', $item->id) }}"
						   class="admin_feedback_show">
							<i class="nav-icon fas fa-angle-down" style="color: black;
												font-size:25px"></i>
						</a>
						<div class="admin_action">
							<a class="admin_btn_delete nestable_action"
							   href="{{ route('admin.vendors.destroy', $item->id) }}">
								<i class="nav-icon fas fa-trash"></i>
							</a>
						</div>

					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	@else
		<h1>Не найдено позиций по вашему запросу</h1>
	@endif
</div>

