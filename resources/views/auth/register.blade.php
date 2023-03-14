@extends('frontend.layout.template')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card" style="margin: 10%">
					<div class="card-header">Регистрация нового пользователя</div>

					<div class="card-body">
						<form method="POST" action="{{ route('frontend.register') }}">
							@csrf

							<div class="row mb-3">
								<label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

								<div class="col-md-6">
									<input id="name" type="text"
									       class="form-control @error('name') is-invalid @enderror" name="name"
									       value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>

								<div class="col-md-6">
									<input id="email" type="email"
									       class="form-control @error('email') is-invalid @enderror" name="email"
									       value="{{ old('email') }}" required autocomplete="email">

									@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

								<div class="col-md-6">
									<input id="password" type="password"
									       class="form-control @error('password') is-invalid @enderror"
									       name="password" required autocomplete="new-password"
									       placeholder="Не менее 2 символов">

									@error('password')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<label for="password-confirm" class="col-md-4 col-form-label
                            text-md-end">Подтвердите пароль</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control"
									       name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-md-6 offset-md-4 d-flex justify-content-center">
									<button type="submit" class="btn btn-success w-100">
										Регистрация
									</button>
								</div>
								<div class="col-md-6 offset-md-4 mt-3 text-center">
									<p>Есть аккаунт? <a href="{{ route('frontend.login') }}">Авторизоваться</a></p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
