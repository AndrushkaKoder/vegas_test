<div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
        <div class="row">


            @if(!empty($contacts))
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Связаться с нами</h4>
                    <ul class="list-unstyled">
                        @foreach($contacts as $item)
                            <li><a href="tel:{{$item->phone}}" style="text-decoration: none"
                                   class="text-white">{{$item->phone}}</a></li>
                            <li><a href="mailto:{{$item->email}}" style="text-decoration: none"
                                   class="text-white">{{$item->email}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($socials))
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Наши социальные сети</h4>
                    <ul class="list-unstyled">
                        @foreach($socials as $item)
                            <li><a href="{{$item->alias}}" style="text-decoration: none"
                                   class="text-white" target="_blank">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="{{route('index')}}" class="navbar-brand d-flex align-items-center">
            <strong>Услуги</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</div>
