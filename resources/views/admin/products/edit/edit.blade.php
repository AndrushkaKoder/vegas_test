@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="card mt-3">
					<h3 class="m-3 text-center">{{ $item->title ?? 'Новый продукт' }} </h3>

					{{ Form::model($item, ['route'=> [$action, $item->id], 'class' => 'admin_edit_form',
					'files' => true]) }}

					@if($item->exists)
						@method('put')
					@endif


					<div class="row">

						<div class="col-xl-2 col-sm-12">
							{{Form::label('Название', '', ['class' => 'form-label'])}}
							{{ Form::text('title' , null, ['class' => 'form-control' ]) }}
						</div>
						<div class="col-xl-2 col-sm-12">
							{{Form::label('slug', '', ['class' => 'form-label'])}}
							{{ Form::text('slug' , null, ['class' => 'form-control' ]) }}
						</div>

						<div class="col-xl-4 col-sm-12">
							<div class="d-flex justify-content-evenly align-items-center flex-column">
								{{Form::label('Производитель', '', ['class' => 'form-label'])}}
								{{ Form::select('vendor_id', $params['vendors'],
									  $item->vendor_id,
									['class' => 'form-select']) }}
							</div>
						</div>

						<div class="col-xl-4 col-sm-12">
							{{Form::label('Цена', '', ['class' => 'form-label'])}}
							{{ Form::text('price' , null, ['class' => 'form-control' ]) }}
						</div>


						<div class="col-xl-4 col-sm-12">
							{{Form::label('Артикул модели', '', ['class' => 'form-label'])}}
							{{ Form::text('vendor_code' , null, ['class' => 'form-control' ]) }}
						</div>

						<div class="col-xl-4 col-sm-12">
							{{Form::label('Штрихкод', '', ['class' => 'form-label'])}}
							{{ Form::text('barcode' , null, ['class' => 'form-control' ]) }}
						</div>
						<div class="col-xl-4 col-sm-12">
							<div class="d-flex justify-content-evenly align-items-center flex-column">
								{{Form::label('Состояние', '', ['class' => 'form-label'])}}
								{{ Form::select('visible', [
									'0' => 'Скрыто',
									 '1' => 'Показано'],
									  null,
									['class' => 'form-select']) }}
							</div>
						</div>

						<div class="col-xl-6 col-sm-12" style="padding:40px  0;">
							{{Form::label('Цена со скидкой', '', ['class' => 'form-label'])}}
							{{ Form::text('discount_price' , null, ['class' => 'form-control' ]) }}

							{{Form::label('Дата начала скидки', '', ['class' => 'form-label'])}}
							{{ Form::date('discount_date_start' , null, ['class' => 'form-control' ]) }}

							{{Form::label('Дата окончания скидки', '', ['class' => 'form-label'])}}
							{{ Form::date('discount_date_end' , null, ['class' => 'form-control' ]) }}

							@if($item->discount())
								<h3 style="color: red">Скидка активна</h3>
							@endif
						</div>

{{--						<div class="col-xl-6 col-sm-12" style="margin-top: 25px">--}}
{{--							<div class="mb-3 d-flex justify-content-center">--}}
{{--								{{ Form::button('Показать СЕО параметры', [--}}
{{--							'class' => 'btn btn-primary mb-3 admin_edit_seo_btn'])--}}
{{--							}}--}}
{{--							</div>--}}
{{--							<div class="admin_edit_seo">--}}

{{--								<div class="mb-3">--}}
{{--									{{ Form::label('seo_title', 'SEO Заголовок', ['class' => 'form-label']) }}--}}
{{--									{{ Form::text('seo_title', null, ['class' => 'form-control']) }}--}}
{{--								</div>--}}

{{--								<div class="mb-3">--}}
{{--									{{ Form::label('seo_description', 'SEO Описание', ['class' => 'form-label']) }}--}}
{{--									{{ Form::text('seo_description', null, ['class' => 'form-control']) }}--}}
{{--								</div>--}}

{{--								<div class="mb-3">--}}
{{--									{{ Form::label('seo_keywords', 'SEO Ключевые слова', ['class' => 'form-label']) }}--}}
{{--									{{ Form::text('seo_keywords', null, ['class' => 'form-control']) }}--}}
{{--								</div>--}}

{{--							</div>--}}
{{--						</div>--}}


						<div class="col-xl-6 col-sm-12">
							{{ Form::label('Описание', '', ['class' => 'form-label']) }}
							{{ Form::textarea('description',
							null,
							['class' => 'edit_content',
							'cols' => '10',
							'rows' => '3'])
							 }}
						</div>

					</div>

					<hr>
					<div class="row">
						<div class="col-xl-4 col-sm-12">

							<div class="admin_edit_images">
								@include('admin.elements._img_uploader', [
									'title' => 'Изображение',
									'name' => 'outer',
									'filepath' => $item->getImgPath('outer', 'medium')
								])
							</div>

							<div class="admin_action_buttons">
								{{ Form::submit('Подтвердить', ['class' => 'btn btn-success']) }}
								<a href="{{ route('admin.products.index') }}" class="btn btn-dark">Отменить</a>
							</div>
						</div>


						<div class="col-xl-8 col-sm-12 d-flex justify-content-center flex-column align-items-center">
							<h5>
								@if($item->categories->count())
									В категории:
								@else
									Привязать к категории:
								@endif
							</h5>

							@include('admin.products.edit.elements._recursive_list', [
								'items' => $params['categories'],
								'product'=> $item
							])
						</div>

					</div>

					{{ Form::close() }}
				</div>
			</div>
		</section>
	</div>
@endsection



