<div class="collapse bg-dark" id="navbarHeader">
	<div class="container">
		<div class="row">


			<div class="col-sm-4 offset-md-1 py-4">
				<h4 class="text-white">Связаться с нами</h4>
				<ul class="list-unstyled">

					@if($phone = \App\Models\Params::getValue('phone'))
						<li>
							<a href="tel: {{ $phone }}" style="text-decoration: none"
							   class="text-white">{{ $phone }}
							</a>
						</li>
					@endif

					@if(!empty($email = \App\Models\Params::getValue('email')))
						<li>
							<a href="mailto: {{ $email }}" style="text-decoration: none"
							   class="text-white">{{ $email }}
							</a>
						</li>
					@endif
				</ul>
			</div>

			<div class="col-sm-4 offset-md-1 py-4">
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
							   class="text-white" target="_blank">Twitter
							</a>
						</li>
					@endif

				</ul>
			</div>
		</div>

	</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
	<div class="container">

		@if($navigation)
			<ul class="nav">
				@foreach($navigation as $item)
					<li class="nav-item">
						<a class="nav-link" href="{{ $item->getNavPath() }}">{{ $item->title }}</a>
						@if($item->childrenSorted->count())
							<ul class="nav-list">
								@foreach($item->childrenSorted as $child)
								<li class="nav-item">
									<a class="nav-link" href="{{ $child->getNavPath() }}">{{ $child->title }}</a>
								</li>
								@endforeach
							</ul>
						@endif
					</li>
				@endforeach
			</ul>
		@endif


		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
		        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
</div>
