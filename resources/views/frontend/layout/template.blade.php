<!doctype html>
<html lang="ru">
<head>
	@include('frontend.layout.meta')
	<title>{{ $page->getSeoTitle() }}</title>

	@stack('head')
</head>
<body>

<header>
	@include('frontend.layout.header')
</header>

@include('frontend.layout.alert')

<main style="min-height: 100vh">
	@yield('content')
</main>

@if(empty($hideFooter))
	<footer class="bg-dark">
		@include('frontend.layout.footer')
	</footer>
@endif

<script src="{{mix('frontend/js/main.js')}}"></script>
</body>
</html>
