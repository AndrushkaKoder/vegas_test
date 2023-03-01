@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">
					@if($item->exists)
						<div class="col-12 mt-3">
							<a href="{{ route('admin.nav.create') }}" class="btn btn-success">Создать пункт
								навигации</a>
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-12 text-center">
						<h1>{{  $item->title ?? 'Новая навигация'}}</h1>
					</div>


					{{ Form::model($item, ['route'=>[$action, $item->id],'class' => 'navigationForm',]) }}

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

						@include('admin.nav.edit._bind_url')
						@include('admin.nav.edit._bind_relation')

						{{ Form::hidden('url_check', '0', ['data-check']) }}
						<div class="col-12 d-flex justify-content-between">
							{{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
							<a href="{{ route('admin.nav.index') }}" class="btn btn-dark">Отмена</a>
						</div>
					</div>
					{{ Form::close() }}

				</div>
			</div>
		</section>
	</div>
@endsection


