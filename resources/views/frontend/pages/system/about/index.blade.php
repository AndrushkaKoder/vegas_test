@extends('frontend.layout.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>{{ $page->title }}</h1>
			</div>
			<hr>
			<div class="col-12">
				{!! $page->content !!}

				<div class="container">
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							<form action="{{ route('frontend.about') }}" method="post"
							      class="d-flex flex-column text-center" enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label for="" class="form-label">Имя</label>
									<input type="text" name="user_name" class="form-control" id="name"
									       value="{{ old('name')}}" required>
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Почта</label>
									<input type="email" name="user_email" class="form-control" id="email"
									       value="{{old('user_email')}}" required>
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Телефон</label>
									<input type="tel" name="user_phone" class="form-control" id="email"
									       value="{{old('user_email')}}" required>
								</div>
								<div class="mb-3">
									<label class="form-check-label" for="text">Сообщение</label>
									<textarea name="text" id="text" cols="50" rows="10" class="form-control"
									          required></textarea>
								</div>
								<div class="mb-3 form-check">
									<input type="file" name="file">
								</div>

								<button type="submit" class="btn btn-primary">Отправить</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
