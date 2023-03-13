@if($items->count())
	@foreach($items as $item)
		<div class="col">
			<div class="card shadow-sm">
				<a href="{{route('frontend.service.show', [$item->slug])}}">

					@if ($img = $item->getImg('outer'))
						<img src="{{ $img->getPath() }}" alt="photo" width="100%" height="225">

					@else
						<div style="background: black; width: 100%; height: 225px">.</div>
					@endif

				</a>
				<div class="card-body">
					<h4>{{$item->title}}</h4>
					<div class="card_description mb-3">
						<p>{{$item->short_content}}</p>
						<a href="{{route('frontend.service.show', [$item->slug])}}">Перейти к
							услуге</a>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-outline-secondary
                                    show_more">Развернуть
							</button>

						</div>
						<small class="text-muted">{{$item->created_at}}</small>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@else
	нет сервисов
@endif
