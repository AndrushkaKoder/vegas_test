@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper position-relative">
		<section class="content">
			<div class="container">

				<div class="row position-absolute" style="z-index: 999">
					@if($item->exists)
						<div class="col-12 d-flex justify-content-end mt-2">
							<a href="{{ route('admin.navigation.create') }}" class="btn btn-success">
								<i class="nav-icon fas fa-plus" style="color: black;
												font-size:25px"></i>
							</a>

							<div class="admin_action ml-3">
								<a href="{{ route('admin.navigation.destroy', $item->id) }}"
								   class="admin_btn_delete btn btn-danger" style="background: red">
									<i class="nav-icon fas fa-trash" style="color: black;
												font-size:25px"></i>
								</a>
							</div>
						</div>
					@endif
				</div>

				<div class="row">
					<div class="col-12 text-center">
						<h1>{{  $item->title ?? 'Новая навигация'}}</h1>
					</div>


					{{ Form::model($item, ['route'=> [$action, $item->id], 'class' => 'navigationForm',]) }}

					@if($item->exists)
						@method('put')
					@endif

					<div class="row">
						<div class="col-12 mb-3">
							{{ Form::label('title', 'Назавание', ['class' => 'form-label']) }}
							{{ Form::text('title', null,  ['class' => 'form-control', 'placeholder' =>
							'Название']) }}
						</div>

						<div class="col-12 mb-3 d-flex justify-content-start buttons_container">
							{{ Form::button('Прописать URL', ['class'=> 'btn btn-info mr-3', 'data-url']) }}
							{{ Form::button('Привязать', ['class'=> 'btn btn-info', 'data-bind']) }}
						</div>

						@include('admin.navigation.edit._bind_url')
						@include('admin.navigation.edit._bind_relation')

						{{ Form::hidden('url_check', '1', ['data-check']) }}
						<div class="col-12 d-flex justify-content-between">
							{{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}

							<a href="{{ route('admin.navigation.index') }}" class="btn btn-dark">Отмена</a>
						</div>
					</div>
					{{ Form::close() }}
				</div>

			</div>
		</section>
	</div>
@endsection


