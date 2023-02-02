@extends('layout.template')

@section('content')

    @if(!empty($info))
    <section class="py-5 text-center container">
        <div class="row py-lg-3">
            <div class="col-lg-6 col-md-8 mx-auto">
                @foreach($info as $item)
                <h1 class="fw-light">{{$item->title}}</h1>
                <p class="lead text-muted">
                    {{$item->content}}
                </p>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


                @if(!empty($services))
                    @foreach($services as $item)
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{route('services.show', [$item->slug])}}">
                            <img src="{{$item->img}}" alt="photo" width="100%" height="225">
                        </a>
                        <div class="card-body">
                            <h4>{{$item->title}}</h4>
                            <div class="card_description mb-3">
                               <p>{{$item->short_content}}</p>
                               <a href="{{route('services.show', [$item->slug])}}">Перейти к услуге</a>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary
                                    show_more">Развернуть</button>

                                </div>
                                <small class="text-muted">{{$item->created_at}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif


            </div>

            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {{$services->links()}}
                </div>
            </div>


        </div>
    </div>


@endsection
