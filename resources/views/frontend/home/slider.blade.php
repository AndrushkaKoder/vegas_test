@if($slides->count())
	<div class="swiper">
		<div class="swiper-wrapper">

			@foreach($slides as $item)
				<div class="swiper-slide d-flex justify-content-center align-items-center flex-column"
				     @if($img = $item->getImgPath('inner', 'medium'))
					     style="background-image: url({{ $img }});">
					@endif
					<div class="content d-flex justify-content-center align-items-center flex-column"
					     style="font-size: 22px">
						<h2>{!! $item->title !!}</h2>
						{!! $item->content !!}
						<a href="{{ $item->link }}" class="btn btn-success p-2">{{ $item->button }}</a>

					</div>
				</div>
			@endforeach

		</div>
		<!-- If we need pagination -->
		<div class="swiper-pagination"></div>

		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

		{{--	<div class="swiper-scrollbar"></div>--}}
	</div>
@endif
