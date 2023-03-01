@if(!empty($groups))
	<div class="bind_item" @if(!$item->navigable) style="display: none" @endif>
		<div class="col-4 mb-3">
			@if(!$item->navigable)
				{{ Form::label('bind_to', 'Привязать к: ', ['class' => 'form-label']) }}
			@else
				{{ Form::label('bind_to', 'Связано со страницей: ', ['class' => 'form-label']) }}
			@endif



			{{ Form::select('bind_to', ['x'=>'x', 'y'=>'y'],'', ['class'=>'form-select']) }}

{{--			<select name="bind_to" class="form-select bind_to">--}}
{{--				@foreach($groups as $className => $items)--}}
{{--					<option value="{{ $className }}"--}}
{{--					        @if($item->navigable_type === $className) selected @endif>--}}
{{--						{{ $items['title'] }}--}}
{{--					</option>--}}
{{--				@endforeach--}}
{{--			</select>--}}
		</div>


		@foreach($groups as $className => $group)
			<div class="bind_inner" @if(!$group['show']) style="display: none" @endif>
				<div class="col-8 mb-3 bind_pages_item active_item">
					<label for="bind_to_page"
					       class="form-label">{{ $group['title'] }}</label>
					<select name="bind_to_item[{{ $className }}]"
					        data-model="{{ $className }}"
					        class="form-select bind_to_page">
						@foreach($group['items'] as $item)
							<option value="{{ $item->id }}"
							        @if($item->navigable_id === $item->id) selected @endif
							>
								{{ $item->title }}
							</option>
						@endforeach
					</select>
				</div>
			</div>
		@endforeach
	</div>
@endif
