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
			<div class="user-panel d-flex justify-content-between align-items-center">
				<div class="image" style="width: 50%;">
					@if($img = currentAdmin()->getImg('admin'))
					<img src="{{ $img->getPath() }}" class="p-2" style="width: 100%; border-radius: 12px">
					@endif
				</div>
				<div class="info">
					<p class="admin_name">
						{{ currentAdmin()->login }}
					</p>
				</div>
			</div>





		<!-- Nav Menu -->
		<nav class="mt-3">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-item">
					<a href="{{ route('admin.page.index') }}" class="nav-link">
						<i class="nav-icon fas fa-list"></i>
						<p>Страницы</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.service.index') }}" class="nav-link">
						<i class="nav-icon fas fa-wrench"></i>
						<p>Услуги</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.feedback.index') }}" class="nav-link">
						<i class="nav-icon fas fa-microphone"></i>
						<p>Обратная связь
							@if(!empty($notifications))<span>+{{ $notifications->count() }}</span> @endif
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.navigation.index') }}" class="nav-link">
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
