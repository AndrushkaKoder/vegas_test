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
			<div class="image" style="width: 150px; height: 100px">
				@if($img = currentAdmin()->getImgPath('admin', 'medium'))
					<img src="{{ $img }}" class="p-2" style="width: 100%; height: 100%; border-radius:12px" alt="admin
					photo">
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
					<a href="{{ route('admin.pages.index') }}" class="nav-link">
						<i class="nav-icon fas fa-list"></i>
						<p>Страницы</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.services.index') }}" class="nav-link">
						<i class="nav-icon fas fa-tag"></i>
						<p>Услуги</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.feedback.index') }}" class="nav-link">
						<i class="nav-icon fas fa-microphone"></i>
						<p>Обратная связь
							@if(!empty($notifications))
								<span>
								@if($notifications->count() !== 0)
										+{{ $notifications->count() }}
									@endif
							</span>
							@endif
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.navigation.index') }}" class="nav-link">
						<i class="nav-icon fas fa-compass"></i>
						<p>Навигация</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.sliders.index') }}" class="nav-link">
						<i class="nav-icon fas fa-image"></i>
						<p>Слайдер</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.params.index') }}" class="nav-link">
						<i class="nav-icon fas fa-wrench"></i>
						<p>Параметры</p>
					</a>
				</li>
				<li class="nav-item">
					<div class="dropdown">
						<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
						style="width: 100%">

							Товары
						</a>

						<ul class="dropdown-menu products_list text-center" style="width: 100%;">
							<li>
								<a href="{{ route('admin.vendors.index') }}" class="nav-link text-black">
									Производители
								</a>
							</li>
							<li>
								<a href="{{ route('admin.categories.index') }}" class="nav-link text-black">
									Категории
								</a>
							</li>
							<li>
								<a href="{{ route('admin.products.index') }}" class="nav-link text-black">
									Продукты
								</a>
							</li>
						</ul>
					</div>
				</li>



			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
