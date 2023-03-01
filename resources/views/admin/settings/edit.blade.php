@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<h1>Администратор</h1>
					</div>
					<div class="col-6">
						<div class="admin_photo_wrapper">
							<div class="img"  style="background: black">.</div>
						</div>
					</div>
					<div class="col-6">
						<form action="{{ route('admin.settings.update', currentAdmin()->id) }}" method="post">
							@csrf
							@method('put')

							<div class="mb-3">
								<label for="admin_login" class="form-label">Логин</label>
								<input type="text" class="form-control" id="admin_login" name="login"
								       value="{{ currentAdmin()->login }}" required>
							</div>
							<div class="mb-3">
								<label for="admin_new_password" class="form-label">Новый пароль</label>
								<input type="password" class="form-control" id="password"
								       name="password" required>
							</div>
							<div class="mb-3">
								<label for="password_repeat" class="form-label">Повторите пароль</label>
								<input type="password" class="form-control" id="password_repeat"
								       name="password_repeat" required>
							</div>
							<div class="mb-3 d-flex flex-column">
								<label for="admin_photo" class="form-label">Загрузить новое фото</label>
								<input type="file" id="admin_photo" name="photo">
							</div>
							<button type="submit" class="btn btn-success mt-3">Сохранить</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection


