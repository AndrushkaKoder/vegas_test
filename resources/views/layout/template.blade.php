<!doctype html>
<html lang="ru" >
<head>
    @include('layout.meta')
    <title>@section('title')Тестовое задание@show</title>
</head>
<body>

<header>
    @include('layout.header')
</header>


    @include('layout.alert')

<main style="min-height: 100vh">
   @yield('content')
</main>

<footer>
   @include('layout.footer')
</footer>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
