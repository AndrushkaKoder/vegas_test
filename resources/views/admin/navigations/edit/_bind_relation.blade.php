@if(!empty($params['navigableGroups']))
	<div class="bind_item" @if(!$item->navigable) style="display: none" @endif>
		<div class="col-4 mb-3">
			@if(!$item->navigable)
				{{ Form::label('bind_to', 'Привязать к: ', ['class' => 'form-label']) }}
			@else
				{{ Form::label('bind_to', 'Связано со страницей: ', ['class' => 'form-label']) }}
			@endif
			{{ Form::select(
				'bind_to',
				array_map(function($item){ return $item['title'] ;}, $params['navigableGroups']),
				$item->navigable_type,
				['class'=>'form-select bind_to']
			) }}
		</div>



		@foreach($params['navigableGroups'] as $className => $group)
			<div class="bind_inner" @if(!$group['show']) style="display: none" @endif>
				<div class="col-8 mb-3 bind_pages_item active_item">
				{{ Form::select("bind_to_item[{$className}]",
					$group['items']->pluck('title', 'id'),
					$item->navigable_type === $className ? $item->navigable_id : '',
					[
						'class' => 'form-select bind_to_page',
						'data-model' => $className
					]
				) }}
				</div>
			</div>
		@endforeach
	</div>
@endif
