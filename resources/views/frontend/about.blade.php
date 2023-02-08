@extends('frontend.layout.template')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12">
                <a href="{{route('frontend.index')}}">На главную</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-5">
                <h1>Немного о нас</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4>Наши преимущества</h4>

                <ul class="adv_list d-flex justify-content-around">
                    <li class="list-group" style="font-size: 20px; font-weight: bold">Скорость</li>
                    <li class="list-group" style="font-size: 20px; font-weight: bold">Качество</li>
                    <li class="list-group" style="font-size: 20px; font-weight: bold">Надежность</li>
                    <li class="list-group" style="font-size: 20px; font-weight: bold">Простота</li>
                </ul>

            </div>

        </div>
    </div>


@endsection
