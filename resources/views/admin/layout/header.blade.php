<nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="{{ route('admin.index') }}" class="nav-link">Главная страница</a>
		</li>
	</ul>



	<ul class="d-flex list-unstyled">
		<li>
			<a href="{{ route('admin.settings.edit', currentAdmin()->id) }}" class="btn btn-dark m-3"><i class="nav-icon
			 fas
			fa-wrench"></i></a>
		</li>
		<li>
			<a href="{{ route('admin.logout') }}" class="btn btn-dark m-3"><i class="nav-icon fas fa-power-off"></i></a>
		</li>
	</ul>


</nav>
