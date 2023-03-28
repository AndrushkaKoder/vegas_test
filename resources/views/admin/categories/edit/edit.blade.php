@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="card mt-3">
					<h3 class="m-3 text-center">{{ $item->title ?? 'Создать категорию' }} </h3>

					{{ Form::model($item, ['route'=> [$action, $item->id], 'class' => 'admin_edit_form',
					'files' => true]) }}

					@if($item->exists)
						@method('put')
					@endif

					<div class="row">
						<div class="col-xl-8 col-sm-12">
							<div class="mb-3">
								{{Form::label('Название', '', ['class' => 'form-label'])}}
								{{ Form::text('title' , null, ['class' => 'form-control' ]) }}
							</div>
							<div class="mb-3">
								{{Form::label('Slug', '', ['class' => 'form-label'])}}
								{{ Form::text('slug' , null, ['class' => 'form-control' ]) }}
							</div>

							<div class="mb-3">
								{{ Form::label('Описание', '', ['class' => 'form-label']) }}
								{{ Form::textarea('description',
								null,
								['class' => 'edit_content',
								'cols' => '10',
								'rows' => '15'])
								 }}
							</div>
						</div>


						<div class="col-xl-4 col-sm-12">

							<div class="mb-3 d-flex justify-content-evenly align-items-center flex-column">
								{{Form::label('Состояние', '', ['class' => 'form-label'])}}
								{{ Form::select('visible', [
									'0' => 'Скрыто',
									 '1' => 'Показано'],
									  null,
									['class' => 'form-select']) }}
							</div>

							<div class="mb-3">
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


							<div class="admin_action_buttons">
								{{ Form::submit('Подтвердить', ['class' => 'btn btn-success']) }}
								<a href="{{ route('admin.categories.index') }}" class="btn btn-dark">Отменить</a>
							</div>

						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</section>

@endsection



