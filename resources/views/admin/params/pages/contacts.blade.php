@extends('admin.params.template')

@section('params-content')

	<div class="mb-3">
		<label for="phone" class="form-label">Телефон сайта</label>
		<input type="tel" name="data[phone]" class="form-control" id="phone" value="{{ \App\Models\Params::getValue('phone') }}">
	</div>

	<div class="mb-3">
		<label for="email" class="form-label">Электронная почта сайта</label>
		<input type="text" name="data[email]" class="form-control" id="email" value="{{ \App\Models\Params::getValue
		('email')
		}}">
	</div>

@endsection
