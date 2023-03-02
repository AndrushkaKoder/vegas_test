{{ Form::model($item, ['route'=> [$action, $item->id], 'class' => 'navigationForm',]) }}

@if($item->exists)
	@method('put')
@endif

<div class="row">
	<div class="col-12 mb-3">
		{{ Form::label('url', 'URI страницы', ['class' => 'form-label']) }}
		{{ Form::text('uri', null, ['class' => 'form-control']) }}
	</div>

	<div class="col-12 mb-3">
		{{ Form::label('title', 'Название страницы', ['class' => 'form-label']) }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
	</div>

	<div class="col-12 mb-3">
		{{ Form::label('seo_title', 'SEO Заголовок', ['class' => 'form-label']) }}
		{{ Form::text('seo_title', null, ['class' => 'form-control']) }}
	</div>

	<div class="col-12 mb-3">
		{{ Form::label('seo_description', 'SEO Описание', ['class' => 'form-label']) }}
		{{ Form::text('seo_description', null, ['class' => 'form-control']) }}
	</div>

	<div class="col-12 mb-3">
		{{ Form::label('seo_keywords', 'SEO Ключевые слова', ['class' => 'form-label']) }}
		{{ Form::text('seo_keywords', null, ['class' => 'form-control']) }}
	</div>

	<div class="col-12 mb-3">
		{{ Form::label('content', 'Контент', ['form-label']) }}
		{{ Form::textarea('content', null,
			 ['class' => 'edit_content',
			 'cols' => '30',
			 'rows' => '10']
			 ) }}
	</div>

</div>
<div class="mb-3 d-flex justify-content-between">
	{{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
	@if($item->exists)
		<div class="admin_action">
			<a href="{{ route('admin.pages.destroy', $item->id) }}"
			   class="admin_btn_delete btn btn-danger" style="background: red">
				<i class="nav-icon fas fa-trash" style="color: black; font-size:25px"></i>
			</a>
		</div>
	@endif
	<a href="{{ route('admin.pages.index') }}" class="btn btn-dark">Отмена</a>
</div>

{{ Form::close() }}
