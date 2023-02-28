@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">

					<div class="col-12 text-center">
						<h1>{{  $navigation->title ?? 'Новая навигация'}}</h1>
					</div>

					<form action="{{ route($action, $navigation->id) }}" method="POST" style="width: 60%; margin: 0
					auto">
						@csrf

						@if($navigation->exists)
							@method('put')
						@endif

						<div class="row">
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Название</label>
								<input class="form-control" id="exampleInputEmail1" name="title" required
								       value="{{ $navigation->title }}">
							</div>

							<div class="col-12 mb-3 d-flex justify-content-start buttons_container">
								<button type="button" class="btn btn-info mr-3" data-url>Прописать URL</button>
								<button type="button" class="btn btn-info" data-bind>Привязать</button>
							</div>

							<div class="url_item" @if(!$navigation->url) style="display: none" @endif>
								<div class="col-12 mb-3">

									@php($required = $navigation->url || !$navigation->exists)
									<label for="exampleInputEmail1" class="form-label">URL</label>
									<input class="form-control" id="url" name="url" @if($required) required @endif
									value="{{ $navigation->url }}">
								</div>
							</div>

							@if(!empty($groups))
								<div class="bind_item" @if(!$navigation->navigable) style="display: none" @endif>
									<div class="col-4 mb-3">
										@if(!$navigation->navigable)
											<label for="bind_to" class="form-label">Привязать к:</label>
										@else
											<label for="bind_to" class="form-label">Связано со страницей:</label>
										@endif
										<select name="bind_to" class="form-select bind_to">
											@foreach($groups as $className => $items)
												<option value="{{ $className }}"
												@if($navigation->navigable_type === $className) selected @endif>
													{{ $items['title'] }}
												</option>
											@endforeach
										</select>
									</div>
{{--									@if($loop->first) style="display: none" @endif--}}
									@foreach($groups as $className => $items)
										<div class="bind_inner" data-className = {{$className}}>
											<div class="col-8 mb-3 bind_pages_item active_item">
												<label for="bind_to_page"
												       class="form-label">{{ $items['title'] }}</label>
												<select name="bind_to_item[{{ $className }}]" data-model="{{ $className }}"
												        class="form-select bind_to_page">
													@foreach($items['items'] as $item)
														<option value="{{ $item->id }}"
														@if($navigation->navigable_id === $item->id) selected @endif>
															{{ $item->title }}
														</option>
													@endforeach
												</select>
											</div>
										</div>
									@endforeach
								</div>
							@endif

							<input type="hidden" data-check value="0" name="url_check">
							<div class="col-12 d-flex justify-content-between">
								<button type="submit" class="btn btn-success">Сохранить</button>
								<a href="{{ route('admin.nav.index') }}" class="btn btn-dark">Отмена</a>
							</div>
						</div>
					</form>

				</div>
			</div>
		</section>
	</div>
@endsection


