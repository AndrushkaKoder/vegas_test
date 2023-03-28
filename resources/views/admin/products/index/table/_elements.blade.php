<div class="card-body" style="min-height: 400px">
	@if($items->count())
		<table class="table table-bordered">
			<thead>
			<tr>
				<th style="width: 10px">№</th>
				<th>Наименование</th>
				<th>Описание</th>
				<th>Цена</th>
				<th>Артикул</th>
				<th>Категория</th>
				<th style="width: 150px;">Действия</th>
			</tr>
			</thead>
			<tbody>

			@foreach($items as $item)
				@php($discount = $item->discount())
				<tr style="text-align: center;
				 @if($item->discount_price && $discount)
					background: yellow
				@endif">
					<td>{{ $item->id }}</td>
					<td>{{ $item->title }}</td>
					<td>{!!  $item->description !!}</td>
					<td>
						@if( $item->discount_price && $discount)
							<span style="text-decoration: line-through">{{ $item->price }} &#8381;</span>
							<span>{{ $item->discount_price }} &#8381;</span>
						@else
							<span>{{ $item->price }} &#8381;</span>
						@endif
					</td>
					<td>{{ $item->vendor_code }}</td>
					<td>
						@if($item->categories->count())
							@foreach($item->categories as $it)
								{{ $it->title }} <br>
							@endforeach
						@endif
					</td>
					<td class="" style="border: none">
						<div class="admin_action d-flex justify-content-between">
							<a href="{{ route('admin.products.edit', $item->id) }}"
							   class="admin_feedback_show">
								<i class="nav-icon fas fa-angle-down" style="color: black;
												font-size:25px"></i>
							</a>

							@include('admin.elements._btn_toggle_visible', [
							'route' => 'admin.products.toggle_params',
							'item' => $item,
							])
							<a class="admin_btn_delete nestable_action"
							   href="{{ route('admin.products.destroy', $item->id) }}">
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

