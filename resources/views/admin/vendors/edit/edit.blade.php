@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="card mt-3">
					<h3 class="m-3 text-center">{{ $item->title ?? 'Новый производитель' }} </h3>

					{{ Form::model($item, ['route'=> [$action, $item->id], 'class' => 'admin_edit_form',
					'files' => true]) }}

					@if($item->exists)
						@method('put')
					@endif


					<div class="row justify-content-center">

						<div class="col-xl-4 col-sm-12 d-flex justify-content-center align-items-center flex-column">
							{{Form::label('Название', '', ['class' => 'form-label'])}}
							{{ Form::text('title' , null, ['class' => 'form-control' ]) }}
						</div>

						<div class="col-xl-4 col-sm-12 d-flex justify-content-center align-items-end">

							<div class="admin_edit_images">
								@include('admin.elements._img_uploader', [
									'title' => 'Логотип',
									'name' => 'outer',
									'filepath' => $item->getImgPath('outer', 'medium')
								])
							</div>

							<div class="admin_action_buttons">
								{{ Form::submit('Подтвердить', ['class' => 'btn btn-success']) }}
								<a href="{{ route('admin.products.index') }}" class="btn btn-dark">Отменить</a>
							</div>
						</div>

					</div>

					{{ Form::close() }}
				</div>
			</div>
		</section>
	</div>
@endsection



