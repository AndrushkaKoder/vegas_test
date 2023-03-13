@if($message = session('success'))
	<div class="alert alert-success frontend_create_alert front_alert" role="alert">
		{{ $message }}
	</div>
@endif


@if($message = session('error'))
	<div class="alert alert-danger frontend_create_alert front_alert" role="alert">
		{{ $message }}
	</div>
@endif


<style>
	.frontend_create_alert{
		position: absolute;
		top: 20%;
		left: 35%;
		z-index: 99999;
		width: 30%;
		text-align: center;
		padding: 20px;
	}
</style>

{{--@push('head')--}}
<script>
	let adminAlert = document.querySelector('.front_alert')
	if (adminAlert) {
		setTimeout(() => {
			adminAlert.remove();
		}, 3000)
	}
</script>
{{--@endpush--}}
