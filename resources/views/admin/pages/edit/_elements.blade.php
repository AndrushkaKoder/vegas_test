{{ Form::model($item, ['route'=> [$action, $item->id], 'class' => 'navigationForm',]) }}

@if($item->exists)
	@method('put')
@endif

<div class="row">
	<div class="col-xl-8 col-sm-12">
		<div class="mb-3 w-50">
			{{ Form::label('url', 'URI страницы', ['class' => 'form-label']) }}
			{{ Form::text('uri', null, ['class' => 'form-control']) }}
		</div>

		<div class="mb-3  w-50">
			{{ Form::label('title', 'Название страницы', ['class' => 'form-label']) }}
			{{ Form::text('title', null, ['class' => 'form-control']) }}
		</div>

		<div class="mb-3">
			{{ Form::label('content', 'Контент', ['form-label']) }}
			{{ Form::textarea('content', null,
				 ['class' => 'edit_content',
				 'cols' => '30',
				 'rows' => '20']
				 ) }}
		</div>
	</div>


	<div class="col-xl-4 col-sm-12">
		<div class="mb-3 d-flex justify-content-center">
			{{ Form::button('Показать СЕО параметры', [
		'class' => 'btn btn-primary mb-3 admin_edit_seo_btn'])
		}}
		</div>
		<div class="admin_edit_seo">

			<div class="mb-3">
				{{ Form::label('seo_title', 'SEO Заголовок', ['class' => 'form-label']) }}
				{{ Form::text('seo_title', null, ['class' => 'form-control']) }}
			</div>

			<div class="mb-3">
				{{ Form::label('seo_description', 'SEO Описание', ['class' => 'form-label']) }}
				{{ Form::text('seo_description', null, ['class' => 'form-control']) }}
			</div>

			<div class="mb-3">
				{{ Form::label('seo_keywords', 'SEO Ключевые слова', ['class' => 'form-label']) }}
				{{ Form::text('seo_keywords', null, ['class' => 'form-control']) }}
			</div>

		</div>
	</div>


</div>

<div class="admin_action_buttons">
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
