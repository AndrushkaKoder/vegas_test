@if($items->count())

	<ul class="more_widget d-flex justify-content-between flex-column list-unstyled mb-3" style="height: 100%;
	text-align: right">
		@foreach($items as $item)
			<li class="{{ hclass(isset($activeService) && $item->id == $activeService->id, 'active') }}">
				<a href="{{ $item->slug }}">{{ $item->title }}</a></li>
		@endforeach
	</ul>

@endif
