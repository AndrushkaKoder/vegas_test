@extends('admin.layout.template')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger admin_create_alert" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li  style="list-style: none">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if(session('success'))
		<div class="alert alert-success admin_create_alert" role="alert">
					{{ session('success') }}
		</div>
	@endif

	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="card mt-3">
					<h3 class="m-3 text-center">{{ $service->title ?? 'Создать сервис' }} </h3>
					<form action="{{ route($action, $service->id) }}" method="POST" class="admin_edit_form"
					      enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label for="edit_title" class="form-label">Название</label>
									<input type="text" name="title" class="form-control" id="edit_title"
									       value="{{ $service->title }}">
								</div>
								<div class="mb-3">
									<label for="edit_short_content" class="form-label">Короткое описание</label>
									<input type="text" name="short_content" class="form-control"
									       id="edit_short_content"
									       value="{{ $service->short_content }}">
								</div>
								<div class="admin_edit_images d-flex justify-content-between">
									<div class="mb-3">
										@if($img = $service->getImg('inner'))
											<p class="text-center">Внутренняя картинка</p>
											<img src="{{ $img->getPath() }}"
											     width="270" height="200" alt="#" class="admin_edit_img mb-2">
										@endif
										<input type="file" name="inner" class="form-control" style="width: 92%">
									</div>
									<div class="mb-3">
										@if($img = $service->getImg('outer'))
											<p class="text-center">Внешняя картинка</p>
											<img src="{{ $img->getPath() }}"
											     width="270" height="200" alt="#" class="admin_edit_img mb-2">
										@endif
										<input type="file" name="outer" class="form-control" style="width: 92%">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-3">
									<label for="edit_content" class="form-label">Описание</label>
									<textarea name="content" class="form-control" id="edit_content" cols="10"
									          rows="17">{{ $service->content }}</textarea>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-between">
								<button type="submit" class="btn btn-success">Подтвердить</button>
								<a href="{{ route('admin.services.index') }}" class="btn btn-dark">Отменить</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
@endsection



