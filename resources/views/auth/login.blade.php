@extends('frontend.layout.template')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card" style="margin: 10%">
					<div class="card-header">Авторизация</div>

					<div class="card-body">
						<form method="POST" action="{{ route('frontend.login') }}" style="width: 80%; margin: auto">
							@csrf

							<div class="row">
								<div class="col-12 mb-3">
									<label for="email"
									       class="form-label">E-mail</label>
									<input id="email" type="email"
									       class="form-control @error('email') is-invalid @enderror" name="email"
									       value="{{ old('email') }}" required autocomplete="email" autofocus>
									@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>

								<div class="col-12 mb-3">
									<label for="password" class="form-label">Пароль</label>
									<input id="password" type="password"
									       class="form-control @error('password') is-invalid @enderror" name="password"
									       required autocomplete="current-password">

									@error('password')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
									@enderror
								</div>

								<div class="col-12 mb-3">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember"
										       id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											Запомнить меня
										</label>
									</div>
								</div>

								<div class="col-12 mb-3">
									<button type="submit" class="btn btn-success w-100">
										Войти
									</button>
								</div>

{{--								@if (Route::has('password.request'))--}}
									<div class="col-12 mb-3">
										<a class="btn btn-link" href="{{ route('frontend.password.request') }}">
											Забыли пароль?
										</a>
									</div>
{{--								@endif--}}
							</div>
						</form>

						<div class="col-12 mt-3 text-center">
							<p>У Вас нет аккаутна?
								<a href="{{ route('frontend.register') }}">зарегистрируйтесь</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
