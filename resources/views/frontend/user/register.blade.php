<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/app.css') }}">
	<title>Личный кабинет</title>
</head>
<body>

<div class="container">
	<div class="row">

		@include('frontend.layout.alert')

		<div class="col-12">
			<form action="{{ route('frontend.login.store') }}" method="post" class="d-flex flex-column align-items-center m-3">
				@csrf
				<h1 class="text-center mt-5">Регистрация нового пользователя</h1>

				<label for="login">
					Логин
					<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
				</label>
				<label for="email">
					Электронная почта
					<input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
				</label>

				<label for="password">
					Пароль
					<input type="password" name="password" class="form-control" required>
				</label>
				<label for="password_repeat">
					Повторите пароль
					<input type="password" name="password_repeat" class="form-control" required>
				</label>
				<label for="data"> Согласен на обработку личных данных</label>
					<input type="checkbox" name="check" class="form-check mb-3 caret" required checked>


				<button type="submit" class="btn btn-success login_btn">Регистрация</button>
			</form>

		</div>

		<div class="col-12 text-center mt-3 d-flex flex-column">
			<a href="{{ route('frontend.login.index') }}" class="">Есть аккаунт? Авторизоваться</a>
			<a href="{{ route('frontend.index') }}" class="login_back">Вернуться на сайт</a>
		</div>
	</div>
</div>


<style>
	.login_form {
		width: 100%;
		display: flex;
		flex-direction: column;
		align-items: center;
		margin: 10% auto;
	}

	label {
		width: 30%;
		margin: 10px 0;
		text-align: center;
	}

	.login_btn {
		width: 30%;
	}

	.login_back {
		font-size: 20px;
		font-weight: bold;
		color: black;
		text-decoration: none;

	}

	.login_alert {
		position: absolute;
		top: 10px;
		left: 25%;
		width: 50%;
	}

	.login_alert ul li {
		list-style: none;
		font-size: 20px;
		text-align: center;
	}


</style>

<script src=" {{ asset('assets/_admin/js/main.js') }}"></script>
</body>
</html>
