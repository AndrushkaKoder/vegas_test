@extends('admin.params.template')

@section('params-content')
	<div class="mb-3">
		@if($vk = \App\Models\Params::getValue('VK'))
			<label for="social_item" class="form-label">VK</label>
			<input type="text" name="data[VK]" class="form-control" value="{{ $vk }}">
		@endif
	</div>
	<div class="mb-3">
		@if($ok = \App\Models\Params::getValue('OK'))
			<label for="social_item" class="form-label">Одноклассники</label>
			<input type="text" name="data[OK]" class="form-control" value="{{ $ok }}">
		@endif
	</div>
	<div class="mb-3">
		<label for="social_item" class="form-label">Twitter</label>
		<input type="text" name="data[twitter]" class="form-control"
		       value="@if($tw = \App\Models\Params::getValue('twitter')) {{ $tw }} @endif">
	</div>
	<div class="mb-3">
		<label for="social_item" class="form-label">Instagram</label>
		<input type="text" name="data[instagram]" class="form-control"
		       value="@if($inst = \App\Models\Params::getValue('instagram')) {{ $inst }} @endif">
	</div>

@endsection
