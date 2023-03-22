<div class="collapse bg-dark" id="navbarHeader">
	<div class="container">
		<div class="row pt-3">


			<div class="col-sm-4 offset-md-1">
				<h4 class="text-white">Связаться с нами</h4>
				<ul class="list-unstyled">

					@if($phone = getParameters('phone'))
						@foreach($phone as $item)
							<li>
								<a href="tel:{{ $item }}" style="text-decoration: none"
								   class="text-white">{{ $item }}
								</a>
							</li>
						@endforeach
					@endif

					@if($email = getParameters('email'))
						@foreach($email as $item)
							<li>
								<a href="mailto: {{ $item }}" style="text-decoration: none"
								   class="text-white">{{ $item }}
								</a>
							</li>
						@endforeach
					@endif
				</ul>
			</div>

			<div class="col-sm-4 offset-md-1">
				<h4 class="text-white">Наши социальные сети</h4>
				<ul class="list-unstyled">

					@if(!empty($vk = \App\Models\Params::getValue('VK')))
						<li>
							<a href="{{ $vk }}" style="text-decoration: none"
							   class="text-white" target="_blank">VK
							</a>
						</li>
					@endif

					@if(!empty($twitter = \App\Models\Params::getValue('OK')))
						<li>
							<a href="{{ $twitter }}" style="text-decoration: none"
							   class="text-white" target="_blank">Одноклассники
							</a>
						</li>
					@endif

				</ul>

			</div>
			<div class="col-2">
				@if(\Illuminate\Support\Facades\Auth::check())
					<a href="{{ route('user.index') }}" class="nav-link" style="color: white; font-size: 20px">
						<i class="far fa-user"></i>
						{{ user()->name }}
					</a>
				@else
					<div class="lk_login">
						<a class="nav-link" href="{{ route('frontend.login') }}" style="color: white; font-size: 20px">
							<i class="far fa-user"></i> Личный кабинет
						</a>
					</div>
				@endif
			</div>
		</div>

	</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
	<div class="container">

		@if($navigation)
			<ul class="nav">
				@foreach($navigation as $item)
					<li class="nav-item {{ hclass($item->isCurrent(request()), 'current') }}">
						<a class="nav-link" href="{{ $item->getNavPath() }}">{{ $item->title }}</a>
						@if($item->childrenSorted->count())
							<ul class="nav-list">
								@foreach($item->childrenSorted as $child)
									<li class="nav-item">
										<a class="nav-link" href="{{ $child->getNavPath() }}">
											{{ $child->title }}</a>
									</li>
								@endforeach
							</ul>
						@endif
					</li>
				@endforeach
			</ul>
		@endif

		<div class="header_action">
			<a href="{{ route('frontend.cart.index') }}" style="margin-right: 20px"><i class="fa-solid
				fa-cart-shopping text-white
				fs-5"></i></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
			        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>


	</div>
</div>
