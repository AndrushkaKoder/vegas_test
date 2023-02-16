@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-3">
						<a href="{{ route('admin.pages.index')}}">
							Вернуться
						</a>
					</div>
					<div class="col-12 text-center">
						<h1>Создать страницу</h1>
					</div>

					<form method="POST" action="{{ route('admin.pages.store') }}" style="width: 60%;
					margin: 0
					auto">
						@csrf
						<div class="row">
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">URI страницы</label>
								<input class="form-control" id="exampleInputEmail1" name="uri" value="{{ old('uri') }}">
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Заголовок страницы</label>
								<input class="form-control" id="exampleInputEmail1" name="title" value="{{ old('title')
								}}">
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputPassword1" class="form-label">СЕО заголовок</label>
								<input class="form-control" id="exampleInputPassword1" name="seo_title"
								       value="{{ old('seo_title')}}">
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputPassword1" class="form-label">СЕО описание страницы</label>
								<input class="form-control" id="exampleInputPassword1" name="seo_description"
								value="{{ old('seo_description') }}">
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Ключевые слова</label>
								<input class="form-control" id="exampleInputEmail1" name="seo_keywords"
								value="{{ old('seo_keywords') }}">
							</div>
							<div class="col-12 mb-3">
								<label for="edit_content" class="form-label">Контент</label>
								<textarea name="content" class="edit_content" cols="31" rows="10"></textarea>
							</div>

						</div>
						<div class="mb-3 d-flex justify-content-between">
							<button type="submit" class="btn btn-success">Сохранить</button>
							<a href="{{ route('admin.pages.index') }}" class="btn btn-dark">Отмена</a>
						</div>
					</form>

				</div>
			</div>
		</section>
	</div>

@endsection
