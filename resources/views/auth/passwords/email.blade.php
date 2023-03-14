@extends('frontend.layout.template')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card" style="margin: 10%">
					<div class="card-header">Сброс пароля приложения</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						<form method="POST" action="{{ route('frontend.password.email') }}" style="width: 70%;
						margin: auto">
							@csrf

							<div class="row mb-3">
								<div class="col-12 mb-3 d-flex flex-column align-items-center">
									<label for="email" class="form-label text-center">Введите почту, на
										которую Мы отправим уникальную ссылку</label>

									<input id="email" type="email"
									       class="form-control @error('email') is-invalid @enderror" name="email"
									       value="{{ old('email') }}" required autocomplete="email" autofocus>

									@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>

							</div>

							<div class="row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										Отправить
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
