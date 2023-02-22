<ol class="dd-list">
	@foreach($items as $item)
		<li class="dd-item" data-id="{{ $item->id }}">

			<div>
				<div class="dd-handle"> </div>
				<a href="#">{{ $item->title }}</a>
			</div>
			@if($item->childrenSorted->count())
				@include('admin.nav._elements', ['items' => $item->childrenSorted])
			@endif
		</li>
	@endforeach
</ol>
