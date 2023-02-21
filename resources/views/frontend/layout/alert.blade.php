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

@push('head')
<script>
	let adminAlert = document.querySelector('.admin_alert')
	if (adminAlert) {
		setTimeout(() => {
			adminAlert.remove();
		}, 3000)
	}
</script>
@endpush
