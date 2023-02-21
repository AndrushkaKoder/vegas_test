@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container">

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<h1>Список страниц</h1>
					</div>
				</div>

				{{--				<div class="row">--}}
				{{--					<div class="col-12">--}}
				{{--						<div id="nestedDemo" class="list-group col nested-sortable"--}}
				{{--						     data-send="{{ route('admin.navUpdate') }}">--}}

				{{--							@foreach($items as $item)--}}
				{{--								<div class="list-group-item nested-1 parent" data-num="{{ $item->position }}"--}}
				{{--								     data-parent="{{ $item->parent_id }}">--}}

				{{--									{{ $item->title }}--}}

				{{--									@if($item->children->count())--}}
				{{--										<div class="list-group nested-sortable">--}}
				{{--											@foreach($item->children as $child)--}}
				{{--												<div class="list-group-item nested-2 child"--}}
				{{--												     data-parent="{{ $child->parent_id }}" data-num="{{--}}
				{{--												     $child->id }}">--}}
				{{--													{{ $child->title }}--}}
				{{--												</div>--}}
				{{--											@endforeach--}}
				{{--										</div>--}}
				{{--									@endif--}}
				{{--								</div>--}}
				{{--							@endforeach--}}

				{{--						</div>--}}
				{{--					</div>--}}
				{{--				</div>--}}


				<div class="row">
					<div class="col-12">
						<div class="cf nestable-lists">

							<div class="dd" id="nestable" data-send="{{ route('admin.navUpdate') }}">

								<ol class="dd-list" >

									<li class="dd-item" data-id="1">
										<div class="dd-handle">Главная страница</div>
									</li>


									<li class="dd-item" data-id="2">
										<div class="dd-handle">Услуги</div>
										<ol class="dd-list">
											<li class="dd-item" data-id="3">
												<div class="dd-handle">Автосервис</div>
											</li>
											<li class="dd-item" data-id="3">
												<div class="dd-handle">Выгул собак</div>
											</li>
											<li class="dd-item" data-id="3">
												<div class="dd-handle">Стрижка</div>
											</li>
										</ol>
									</li>


									<li class="dd-item" data-id="11">
										<div class="dd-handle">О нас</div>
									</li>


									<li class="dd-item" data-id="12">
										<div class="dd-handle">Контакты</div>
									</li>


								</ol>

							</div>

						</div>
					</div>
				</div>

			</div>
		</section>
	</div>

@endsection
