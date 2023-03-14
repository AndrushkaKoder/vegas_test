@extends('frontend.lk.template')

@section('account-content')

	<h1>Настройки аккаунта</h1>
	<form action="{{ route('user.settings.update') }}" method="POST" class="w-75 mt-3">
		@csrf
		@method('PUT')

		<div class="mb-3">
			<input type="text" name="name" class="form-control" value="{{ user()->name }}" required>
		</div>
		<div class="mb-3">
			<input type="text" name="email" class="form-control" value="{{ user()->email }}" required>
		</div>
		<div class="mb-3">
			<input type="text" name="password" class="form-control" placeholder="Новый пароль">
		</div>
		<div class="mb-3">
			<input type="text" name="password_confirmation" class="form-control" placeholder="Повторите пароль">
		</div>

		<button class="btn btn-success">Сохранить новые данные</button>
	</form>

@endsection
