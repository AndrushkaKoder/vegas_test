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

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ mix('assets/_admin/js/app.js') }}"></script>
</body>
</html>
