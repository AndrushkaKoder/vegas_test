<ol class="dd-list">
	@foreach($items as $item)
	<li class="dd-item" data-id="{{ $item->id }}">
		<div class="dd-handle" style="height: 50px">{{ $item->title }}</div>
		<div class="admin_action d-flex justify-content-around" style="float: right; position: relative; top:
			-40px">
			<a href="{{ $item->slug }}" class="nestable_action" target="_blank">
				<i class="nav-icon fas fa-share"></i>
			</a>
			<a href="{{ route('admin.services.edit', $item->id) }}" class="nestable_action">
				<i class="nav-icon fas fa-pen"></i>
			</a>
			<a class="admin_btn_delete nestable_action" href="{{ route('admin.services.destroy', $item->id) }}">
				<i class="nav-icon fas fa-trash"></i>
			</a>
		</div>
	</li>
	@endforeach
</ol>
