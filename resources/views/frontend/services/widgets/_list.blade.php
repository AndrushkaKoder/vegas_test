@if($services->count())
<div class="container-fluid">
	<div class="row">
		<div class="col-12" style="background: #563d7c">
			<ul class="more_widget d-flex justify-content-between list-unstyled">
				@foreach($services as $item)
				<li class="{{ hclass(isset($activeService) && $item->id == $activeService->id, 'active') }}" >
					<a href="{{ $item->slug }}">{{ $item->title }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif
