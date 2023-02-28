<!doctype html>
<html lang="ru">
<head>
	@include('frontend.layout.meta')
	<title>{{ $page->seo_title }}</title>

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

<footer class="bg-dark">
	@include('frontend.layout.footer')
</footer>

<script src="{{mix('frontend/js/main.js')}}"></script>
</body>
</html>
