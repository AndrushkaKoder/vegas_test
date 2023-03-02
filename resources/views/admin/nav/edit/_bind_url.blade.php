<div class="url_item" @if(!$item->url) style="display: none" @endif>
	<div class="col-12 mb-3">

		{{ Form::label('url', 'URL', ['class' => 'form-label']) }}
		{{ Form::text('url', null, [
			'class' => 'form-control',
			'id' => 'url'
		]) }}
	</div>
</div>
