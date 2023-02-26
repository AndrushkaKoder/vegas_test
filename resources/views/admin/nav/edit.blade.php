@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">

					<div class="col-12 text-center">
						<h1>{{ $item->title }}</h1>
					</div>

					<form action="{{ route('admin.nav.update', $item->id) }}" method="post" style="width: 60%; margin: 0
					 auto">
						@csrf
						@method('put')
						<div class="row">
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Название</label>
								<input class="form-control" id="exampleInputEmail1" name="title"
								       value="{{ $item->title }}">
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">URL</label>
								<input class="form-control" id="exampleInputEmail1" name="url"
								       value="{{ $item->url }}">
							</div>
							@if($item->childrenSorted->count())
								<div class="col-12 mb-3">
									<label for="inside" class="form-label">Вложенные страницы:</label>
									<ul>
										@foreach($item->childrenSorted as $cs)
											<li><a href="{{ route('admin.nav.edit', $cs->id) }}">{{ $cs->title }}</a>
											</li>
										@endforeach
									</ul>
								</div>
							@endif
							<div class="col-12 d-flex justify-content-between">
								<button type="submit" class="btn btn-success">Сохранить</button>
								<div class="admin_action">
									<a href="{{ route('admin.nav.destroy', $item->id) }}"
									   class="admin_btn_delete btn btn-danger" style="background: red">
										<i class="nav-icon fas fa-trash" style="color: black;
												font-size:25px"></i>
									</a>
								</div>
								<a href="{{ route('admin.nav.index') }}" class="btn btn-dark">Отмена</a>
							</div>
						</div>
					</form>

				</div>
			</div>
		</section>
	</div>

@endsection
