@extends('frontend.layout.template')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card" style="margin: 10%">
					<div class="card-header">Сброс пароля</div>

					<div class="card-body">
						<form method="POST" action="{{ route('frontend.password.update') }}">
							@csrf

							<input type="hidden" name="token" value="{{ $token }}">

							<div class="row">

								<div class="col-12">
									<label for="email"
									       class="form-label "></label>

									<input id="email" type="email"
									       class="form-control @error('email') is-invalid @enderror" name="email"
									       value="{{ $email ?? old('email') }}" hidden required autocomplete="email"
									       autofocus>

									@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>


								<div class="col-12 mb-3">
									<label for="password"
									       class="form-label">Новый пароль</label>
									<input id="password" type="password"
									       class="form-control @error('password') is-invalid @enderror" name="password"
									       required autocomplete="new-password">

									@error('password')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror

								</div>


								<div class="col-12 mb-3">
									<label for="password-confirm"
									       class="form-label">Повторите новый пароль</label>
									<input id="password-confirm" type="password" class="form-control"
									       name="password_confirmation" required autocomplete="new-password">

								</div>

								<div class="col-12 mb-3 d-flex justify-content-center">
									<button type="submit" class="btn btn-success">
										Сохранить новый пароль
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
