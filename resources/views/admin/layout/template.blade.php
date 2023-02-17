<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Администратор</title>
    @include('admin.layout.meta')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('admin.layout.header')

    @include('admin.layout.sidebar')

	@include('admin.messages.messages')
    <main>
        @yield('content')
    </main>

    <footer class="main-footer">
        @include('admin.layout.footer')
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>

</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('assets/_admin/js/admin.js') }}"></script>
<script src="{{ asset('assets/_admin/js/main.js') }}"></script>
</body>
</html>
