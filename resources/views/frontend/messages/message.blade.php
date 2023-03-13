@if($errors->any())
	<div class="alert alert-danger admin_create_alert admin_alert" role="alert">
		<ul>
			@foreach($errors->all() as $error)
				<li style="list-style: none">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if($message = session('success'))
	<div class="alert alert-success admin_create_alert admin_alert" role="alert">
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
