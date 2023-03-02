@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="card mt-3">
					<h3 class="m-3 text-center">{{ $service->title ?? 'Создать сервис' }} </h3>

					{{ Form::model($service, ['route'=> [$action, $service->id], 'class' => 'admin_edit_form',]) }}

					@if($service->exists)
						@method('put')
					@endif

					<div class="row">
						<div class="col-6">

							<div class="mb-3">
								{{Form::label('Название', '', ['class' => 'form-label'])}}
								{{ Form::text('title' , null, ['class' => 'form-control' ]) }}
							</div>

							<div class="mb-3">
								{{Form::label('Короткое описание', '', ['class' => 'form-label'])}}
								{{ Form::text('short_content' , null, ['class' => 'form-control' ]) }}
							</div>

							{{ Form::button('Показать СЕО параметры', [
								'class' => 'btn btn-primary mb-3 admin_edit_seo_btn'])
								}}

							<div class="admin_edit_seo">
								<div class="mb-3">
									{{Form::label('SEO заголовок', '', ['class' => 'form-label'])}}
									{{ Form::text('seo_title' , null, ['class' => 'form-control' ]) }}
								</div>

								<div class="mb-3">
									{{Form::label('SEO описание', '', ['class' => 'form-label'])}}
									{{ Form::text('seo_description' , null, ['class' => 'form-control' ]) }}
								</div>

								<div class="mb-3">
									{{Form::label('SEO ключеые слова', '', ['class' => 'form-label'])}}
									{{ Form::text('seo_keywords' , null, ['class' => 'form-control' ]) }}
								</div>

							</div>
							<div class="admin_edit_images d-flex justify-content-between">
								@include('admin.elements._img_uploader', [
									'title' => 'Внутренняя картинка',
									'name' => 'inner',
									'file' => $service->getImg('inner')
								])
								@include('admin.elements._img_uploader', [
									'title' => 'Внешняя картинка',
									'name' => 'outer',
									'file' => $service->getImg('outer')
								])
							</div>
						</div>
						<div class="col-6">
							<div class="mb-3">
								{{ Form::label('Описание', '', ['class' => 'form-label']) }}
								{{ Form::textarea('content',
								null,
								['class' => 'edit_content',
								'cols' => '10',
								'rows' => '17'])
								 }}
							</div>
						</div>
						<div class="col-12 d-flex justify-content-between">
							{{ Form::submit('Подтвердить', ['class' => 'btn btn-success']) }}
							<a href="{{ route('admin.services.index') }}" class="btn btn-dark">Отменить</a>
						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</section>
@endsection



