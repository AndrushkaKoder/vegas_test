@extends('frontend.layout.template')

@section('content')
<div class="title_content bg-dark text-white" style="min-height: 700px">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center text-white" style="margin: 20% auto">
				<h1>Добро пожаловать</h1>
				<p>Наш ресурс поможет найти лучшие сервисы по доступной цене</p>
				<a href="{{ route('frontend.services') }}" class="btn btn-success">Подобрать</a>
			</div>
		</div>
	</div>
</div>

@endsection
