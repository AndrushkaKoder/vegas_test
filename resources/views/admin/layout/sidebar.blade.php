<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('frontend.index') }}" class="brand-link" target="_blank">
		<img src="{{ asset('assets/_admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
		     class="brand-image img-circle elevation-3"
		     style="opacity: .8">
		<span class="brand-text font-weight-light">На сайт</span>
	</a>

	<!-- Nav -->
	<div class="sidebar">
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{ asset('assets/_admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User
                Image">
				</div>
				<div class="info">
					<p class="admin_name">
						{{ currentAdmin()->login }}
					</p>
				</div>
			</div>





		<!-- Nav Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-item">
					<a href="{{ route('admin.pages.index') }}" class="nav-link">
						<i class="nav-icon fas fa-list"></i>
						<p>Страницы</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.services.index') }}" class="nav-link">
						<i class="nav-icon fas fa-wrench"></i>
						<p>Услуги</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.feedback.index') }}" class="nav-link">
						<i class="nav-icon fas fa-microphone"></i>
						<p>Обратная связь</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.nav.index') }}" class="nav-link">
						<i class="nav-icon fas fa-compass"></i>
						<p>Навигация</p>
					</a>
				</li>


			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
