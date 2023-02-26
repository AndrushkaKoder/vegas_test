@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">

					<div class="col-12 text-center">
						<h1>Создание новой страницы</h1>
					</div>

					<form action="{{ route('admin.nav.store') }}" method="post" style="width: 60%; margin: 0 auto">
						@csrf
						<div class="row">
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Название</label>
								<input class="form-control" id="exampleInputEmail1" name="title" required>
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">URL</label>
								<input class="form-control" id="exampleInputEmail1" name="url" required>
							</div>
							<div class="col-12 d-flex justify-content-between">
								<button type="submit" class="btn btn-success">Сохранить</button>
								<a href="{{ route('admin.nav.index') }}" class="btn btn-dark">Отмена</a>
							</div>
						</div>
					</form>

				</div>
			</div>
		</section>
	</div>

@endsection
