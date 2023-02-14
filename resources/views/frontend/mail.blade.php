<h1>Новая заявка № {{ $feedback->id }}</h1>
@foreach($feedback->getData() as $key => $value)
	<p>{{$key}}: <strong>{{ $value }}</strong></p>
@endforeach


