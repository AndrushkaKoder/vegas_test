@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-12 mt-3">
						<a href="{{ route('admin.feedback.index')}}">
							Вернуться
						</a>
					</div>
					<div class="col-12 text-center">
						<h1>Заявка на обратную связь №{{ $item->id }}</h1>
					</div>
					<form style="width: 60%; margin: 0 auto">
						<div class="row">

							<div class="col-4 mb-3">
								<label for="exampleInputEmail1" class="form-label">Имя отправителя</label>
								<input class="form-control" id="exampleInputEmail1"
								       value="{{ $item->user_name }}"
								       disabled>
							</div>
							<div class="col-4 mb-3">
								<label for="exampleInputPassword1" class="form-label">Телефон</label>
								<input class="form-control" id="exampleInputPassword1"
								       value="{{ $item->user_phone }}" disabled>
							</div>
							<div class="col-4 mb-3">
								<label for="exampleInputPassword1" class="form-label">E-mail</label>
								<input class="form-control" id="exampleInputPassword1"
								       value="{{ $item->user_email }}" disabled>
							</div>
							<div class="col-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Тип</label>
								<input class="form-control" id="exampleInputEmail1"
								       value="{{$item->feedbackType->title }}" disabled>
							</div>

							@foreach($item->user_data as $ud)
								<div class="col-12 mb-3">
									<label class="form-label">{{ $ud['title'] }}</label>
									@if(strlen($ud['value']) > 100)
										<textarea class="form-control" cols="5" rows="10"
										          disabled>{{ $ud['value'] }}</textarea>
									@else
										<input class="form-control" disabled value="{{ $ud['value'] }}">
									@endif
								</div>
							@endforeach

						</div>
						<div class="mb-3 d-flex justify-content-between">
							<a class="btn btn-success" href="tel:{{$item->user_phone}}">Позвонить
								отправителю</a>
							@if($item->user_email)
								<a class="btn btn-primary" href="mailto:{{$item->user_email}}">Написать отправителю</a>
							@endif
							<div class="admin_action">
								<a href="{{ route('admin.feedback.destroy', $item->id) }}"
								   class="admin_btn_delete btn btn-danger" style="background: red">
									<i class="nav-icon fas fa-trash" style="color: black;
												font-size:25px"></i>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>

@endsection
