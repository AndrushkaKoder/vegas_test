@extends('admin.layout.template')

@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h1>Параметры</h1>
					</div>

					<div class="col-xl-3 col-md-12 d-flex flex-column">
						<a href="{{ route('admin.params.main') }}" class="btn btn-warning mb-5"
						   data-params_button>Основные</a>
						<a href="{{ route('admin.params.social') }}" class="btn btn-warning mb-5"
						   data-params_button>Социальные сети</a>
						<a href="{{ route('admin.params.contacts') }}" class="btn btn-warning mb-5"
						   data-params_button>Контакты</a>
					</div>

					<div class="col-xl-9 col-md-12">
						<form action="{{ route('admin.params.update') }}" method="POST" enctype="multipart/form-data"
						      style="width: 80%;
						margin:
						auto">
							@csrf

							@yield('params-content')

							<button type="submit" class="btn btn-primary">Сохранить</button>
						</form>
					</div>

				</div>
			</div>

		</section>
	</div>
@endsection
