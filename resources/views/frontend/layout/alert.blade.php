@if($message = session('success'))
	<div class="alert alert-success admin_create_alert admin_alert" role="alert">
		{{ $message }}
	</div>
@endif


@if($message = session('error'))
	<div class="alert alert-danger admin_create_alert admin_alert" role="alert">
		{{ $message }}
	</div>
@endif
