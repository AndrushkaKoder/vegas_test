<div class="url_item" @if(!$item->url) style="display: none" @endif>
	<div class="col-12 mb-3">
{{--		{{ Form::label('url', '', ['class' => 'form-label']) }}--}}
{{--		{{ Form::text('url','', ['class' => 'form-control','required' => 'false', 'id' => 'url']) }}--}}

		@php($required = $item->url || !$item->exists)
		<label for="exampleInputEmail1" class="form-label">URL</label>
		<input class="form-control" id="url" name="url" @if($required) required @endif
		value="{{ $item->url }}">
	</div>
</div>
