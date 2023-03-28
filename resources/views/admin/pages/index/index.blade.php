@extends('admin.layout.template')


@section('content')
	<div class="content-wrapper">
		<section class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-6 mt-5">
						<a href="{{ route('admin.pages.create') }}" class="btn btn-success">Создать страницу</a>
					</div>
				</div>

				<div class="row">
					@if($items->count())
						<div class="col-12 mt-5">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Страницы сайта</h3>
								</div>

								<table class="table table-bordered">
									<thead>
									<tr style="text-align: center">
										<th style="width: 10px">id</th>
										<th style="width: 80px">URI</th>
										<th style="width: 180px;">Название</th>
										<th style="width: 180px">СЕО заголовок</th>
										<th style="width: 280px">СЕО описание</th>
										<th style="width: 180px">Ключевые слова</th>
										<th style="width: 150px">действия</th>
									</tr>
									</thead>
									<tbody>
									@foreach($items as $item)
										<tr>
											<td>{{ $item->id }}</td>
											<td>{{ $item->uri }}</td>
											<td>{{ $item->title }}</td>
											<td>{!! $item->seo_title !!}</td>
											<td>{{ $item->seo_description }}</td>
											<td>{{ $item->seo_keywords }}</td>
											<td>
												<div class="admin_action d-flex justify-content-around">
													@if($url = $item->getUrl())
														<a href="{{ $url }}" target="_blank">
															<i class="nav-icon fas fa-share"></i>
														</a>
													@endif
													<a href="{{ route('admin.pages.edit', $item->id) }}">
														<i class="nav-icon fas fa-pen"></i>
													</a>

													<div class="admin_action">
														<a class="admin_btn_delete"
														   href="{{ route('admin.pages.destroy', $item->id) }}">
															<i class="nav-icon fas fa-trash"></i>
														</a>
													</div>

												</div>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					@else
						<div class="col-12">
							<h1>Страниц нет, срочно добавляйте</h1>
						</div>
					@endif
				</div>
			</div>
		</section>
	</div>

@endsection
