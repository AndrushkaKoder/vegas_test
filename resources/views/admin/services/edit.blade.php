@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">
				<div class="card mt-3">
					<h3 class="m-3 text-center">{{ $service->title ?? 'Создать сервис' }} </h3>
					<form action="{{ route($action, $service->id) }}" method="POST" class="admin_edit_form"
					      enctype="multipart/form-data">
						@csrf

						@if($service->exists)
							@method('put')
						@endif

						<div class="row">
							<div class="col-6">
								<div class="mb-3">
									<label for="edit_title" class="form-label">Название</label>
									<input type="text" name="title" class="form-control" id="edit_title"
									       value="{{ $service->title ?? old('title') }}">
								</div>
								<div class="mb-3">
									<label for="edit_short_content" class="form-label">Короткое описание</label>
									<input type="text" name="short_content" class="form-control"
									       id="edit_short_content"
									       value="{{ $service->short_content ?? old('short_content') }}">
								</div>
								<button type="button" class="btn btn-primary admin_edit_seo_btn">
									Показать СЕО параметры</button>
								<div class="admin_edit_seo">
									<div class="mb-3">
										<label for="edit_short_content" class="form-label">СЕО заголовок</label>
										<input type="text" name="seo_title" class="form-control"
										       id="edit_short_content"
										       value="{{ $service->seo_title ?? old('seo_title')  }}">
									</div>
									<div class="mb-3">
										<label for="edit_short_content" class="form-label">СЕО описание</label>
										<input type="text" name="seo_description" class="form-control"
										       id="edit_short_content"
										       value="{{ $service->seo_description ?? old('seo_description') }}">
									</div>
									<div class="mb-3">
										<label for="edit_short_content" class="form-label">СЕО ключеые слова</label>
										<input type="text" name="seo_keywords" class="form-control"
										       id="edit_short_content"
										       value="{{ $service->seo_keywords ?? old('seo_keywords') }}">
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
									<label for="edit_content" class="form-label">Описание</label>
									<textarea name="content" class="edit_content" id="edit_content"  cols="10"
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



