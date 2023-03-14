@extends('frontend.layout.template', [
	'hideFooter' => true,
])

@section('content')
	<div class="container">
		<div class="row">

			<div class="col-md-8">
				<div class="lk_content_wrapper">
					@yield('account-content')
				</div>
			</div>

			<div class="col-md-4">
				<aside class="aside_wrapper">
					<div class="aside_wrapper_header">
						<h3><a href="{{ route('user.index') }}" style="color: black">{{ user()->name }}</a></h3>
					</div>
					<div class="aside_wrapper_content">
						<ul>
							<li><a href="{{ route('user.orders') }}">Заказы</a></li>
							<li><a href="{{ route('user.settings') }}">Настройки</a></li>
						</ul>
						<form action="{{ route('frontend.logout') }}" method="POST">
							@csrf
							<button type="submit" class="btn btn-warning">Выйти</button>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</div>
@endsection
