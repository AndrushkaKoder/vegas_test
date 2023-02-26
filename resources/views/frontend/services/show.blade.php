@extends('frontend.layout.template')

@section('content')

	<div class="container-fluid">
		<div class="row mt-5">
			<div class="col-lg-6 col-md-12 inside_img mb-5 d-flex flex-column justify-content-center">

				@if($img = $page->getImg('inner'))
					<img src="{{ $img->getPath() }}" alt="photo" width="80%"
					     height="405" style="margin: 0 auto">
				@else
					<div style="background: black; width: 100%; height: 405px">.</div>
				@endif

				<div class="card-body text-center">
					<h4 class="card_inside_title">{{$page->title}}</h4>
					<div class=" mb-3">
						<p class="card_inside_short_content">{{$page->short_content}}</p>
						<hr>
						<p class="card_inside_content">{!! $page->content !!}</p>
					</div>

					<div class="d-flex justify-content-end">
						<small class="">{{$page->created_at}}</small>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-12">

				<h4 class="text-center">Заказать услугу</h4>
				<p class="text-center">Чтобы заказать услугу <strong>{{$page->title}}</strong> оставьте Ваш телефон и мы
					свяжемся с
					вами</p>
				<form class="inside_form" style="width: 80%" action="{{ route('frontend.sendEmailService') }}"
				      method="post">
					@csrf
					<input type="hidden" name="service"
					       value="{{ $page->id }}">

					<label for="name" class="form-check-label">
						Имя
						<input class="form-control" type="text" name="user_name"
						       required placeholder="Как к Вам обращаться?">
					</label>

					<label for="phone" class="form-check-label">
						Телефон
						<input class="form-control" type="tel" name="user_phone"
						       required placeholder="Обещам не звонить с рекламой">
					</label>
					<label for="phone" class="form-check-label">
						E-mail
						<input class="form-control" type="email" name="user_email"
						       placeholder="Можете оставить вашу почту">
					</label>

					<button type="submit" class="btn btn-success mt-3">Заказать звонок</button>
				</form>
			</div>
			<div class="col-lg-1">
				@include('frontend.services.widgets._list', ['activeService' => $page])
			</div>

		</div>
	</div>
@endsection
