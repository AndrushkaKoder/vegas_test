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
			<td>{!! $item->content !!}</td>
			<td>{{ $item->created_at }}</td>
			<td>
				<div class="admin_action d-flex justify-content-around">
					<a href="{{ route('admin.services.edit', $item->id) }}">
						<i class="nav-icon fas fa-pen"></i>
					</a>
					<a class="admin_btn_delete" href="{{ route('admin.services.destroy', $item->id) }}">
						<i class="nav-icon fas fa-trash"></i>
					</a>
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
