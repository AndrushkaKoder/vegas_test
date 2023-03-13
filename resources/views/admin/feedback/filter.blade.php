<form action="{{ route('admin.feedback.index') }}" method="get" class="text-center">

	<div class="mb-3">
		<input type="text" name="search" class="form-control" placeholder="поиск по имени или телефону" value="{{ request
	('search') }}">
	</div>

	<h4><strong>Фильтр</strong></h4>

	@if(!empty($filterData))
		@foreach($filterData as $value)
			<div class="mt-2">
				@php($selected = request($value['name'], Arr::get($value, 'default_selected', -1)))
				<label for="filter_select" class="form-label">{{ $value['label'] }}</label>
				<select name="{{ $value['name'] }}" id="filter_select" class="form-select">

					@foreach($value['data'] as $k => $v)
						<option value="{{ $k }}" @if($k == $selected) selected @endif>
							{{ $v }}
						</option>
					@endforeach
				</select>
			</div>
		@endforeach
	@endif

	@if(!empty($sortData))
		@foreach($sortData as $value)
			<div class="mt-2">
				@php($selected = request($value['name'], Arr::get($value, 'default_selected', -1)))
				<label for="filter_select" class="form-label">{{ $value['label'] }}</label>
				<select name="{{ $value['name'] }}" id="filter_select" class="form-select">

					@foreach($value['data'] as $k => $v)
						<option value="{{ $k }}" @if($k == $selected) selected @endif>
							{{ $v }}
						</option>
					@endforeach
				</select>
			</div>
		@endforeach
	@endif

	<div class="mt-3 d-flex justify-content-between">
		<button type="submit" class="btn btn-success">Фильтровать</button>
		<a href="{{ route('admin.feedback.index') }}" class="btn btn-dark">Отмена</a>
	</div>
</form>
