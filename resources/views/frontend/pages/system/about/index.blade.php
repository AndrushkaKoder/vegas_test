@extends('frontend.layout.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>{{ $page->title }}</h1>
			</div>
			<hr>
			<div class="col-12">
				{!! $page->content !!}

				<div class="container">
					<div class="row">
						<div class="col-12 d-flex justify-content-center">

							{{ Form::open(['route' =>  'frontend.sendEmailAbout',
 											'method' => 'post',
 											'class' => 'd-flex flex-column text-center',
 											'files' => 'true']) }}

							<div class="mb-3">
								{{ Form::label('name', 'Имя', ['class' => 'form-label']) }}
								{{ Form::text('user_name', '', [
								 'class' => 'form-control',
								 'id' => 'name',
								 'required' => '',
								 'placeholder' => 'Ваше имя']) }}
							</div>

							<div class="mb-3">
								{{ Form::label('email', 'Электронная почта', ['class' => 'form-label']) }}
								{{ Form::email('user_email', '', [
								 'class' => 'form-control',
 							 	'id' => 'email',
 							 	'required' => '',
 							 	'placeholder' => 'email'
								]) }}
							</div>

							<div class="mb-3">
								{{ Form::label('phone', 'Телефон', ['class' => 'form-label']) }}
								{{ Form::tel('user_phone', '', [
								 'class' => 'form-control',
 							 	'id' => 'phone',
 							 	'required' => '',
 							 	'placeholder' => 'мобильный'
								]) }}
							</div>

							<div class="mb-3">
								{{ Form::textarea('user_feedback', '', ['class'=> 'form-control',
								'id' => 'feedback',
								'cols' => 50,
								'rows' => 10,
								'required' => '',
								'placeholder' => 'Ваши пожелания для нас']) }}
							</div>

							<div class="mb-3 form-check">
								{{ Form::file('file') }}
							</div>

							<div class="mb-3">
								{{ Form::submit('Отправить', ['class' => 'btn btn-primary']) }}
							</div>

							{{ Form::close() }}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
