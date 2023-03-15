<div class="swiper">
	<div class="swiper-wrapper">

		@if($slides->count())
			@foreach($slides as $item)
				<div class="swiper-slide d-flex justify-content-center align-items-center flex-column"
				     @if($img = $item->getImg('inner'))
					     style="background-image: url({{$img->getPath() }})">
					@endif
					<h1>{{ $item->title }}</h1>
					<h3>{{ $item->content }}</h3>
					<a href="{{ $item->link }}" class="btn btn-success">Подобрать</a>
				</div>
			@endforeach
		@endif

	</div>
	<!-- If we need pagination -->
	<div class="swiper-pagination"></div>

	<!-- If we need navigation buttons -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>

	{{--	<div class="swiper-scrollbar"></div>--}}
</div>
