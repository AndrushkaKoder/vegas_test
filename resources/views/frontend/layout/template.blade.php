<!doctype html>
<html lang="ru">
<head>
	@include('frontend.layout.meta')
	<title>@section('title')
			Тестовое задание
		@show</title>
</head>
<body>

<header>
	@include('frontend.layout.header')
</header>


@include('frontend.layout.alert')

<main style="min-height: 100vh">
	@yield('content')
</main>

<footer>
	@include('frontend.layout.footer')
</footer>


<script src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>
