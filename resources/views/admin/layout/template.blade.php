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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="{{ mix('assets/_admin/js/app.js') }}"></script>
</body>
</html>
