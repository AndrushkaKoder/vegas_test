<nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{ route('admin.index') }}" class="nav-link">Главная страница</a>
		</li>
	</ul>
	<a href="{{ route('admin.logout') }}" class="btn btn-success m-3">Выйти</a>
</nav>
