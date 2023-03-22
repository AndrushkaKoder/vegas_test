@extends('admin.params.template')

@section('params-content')

	<div class="mb-3">
		@if($sitename = \App\Models\Params::getValue('sitename'))
		<label for="sitename" class="form-label">Название сайта</label>
		<input type="text" class="form-control" name="data[sitename]" id="sitename" value="{{ $sitename }}">
		@endif
	</div>
	<div class="mb-3">
		<label for="favicon" class="form-label">Favicon сайта</label>
		<input type="file"  name="favicon" class="form-control" id="exampleInputPassword1">
	</div>

@endsection
