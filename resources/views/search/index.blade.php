@extends('templates.header')

@section('main_content')
	
	<main>
		<div class="wrapper">
			<div>
				<h1>Результаты поиска</h1>

				@if($results->count() == 0)
					<p> По запросу "{{ $query }}" ничего не найдено.</p>
				@else
					<p> По запросу "{{ $query }}" найдены следующие записи: </p>

					<div class="images">
						@foreach($results as $result)
							@foreach($result->images as $image)
								<a href="{{ route('article.index', $image->species_id) }}">
									<img src="{{ asset('/public/' . $image->img_url) }}">

									<div class="description">
										<span> {{ $image->species->name }} </span>
										<span class="latin_name"> <i> {{ $image->species->latin_name }} </i> </span>

										<div class="notes">
											@if($image->species->rare == 1)
												<span class="rare"> <i class="fa-solid fa-circle"></i> Редкий</span>
											@endif

											@if($image->species->red_list == 1)
												<span class="red_list"> <i class="fa-solid fa-circle"></i> Красная книга</span>
											@endif
										</div>
									</div>
								</ф>
							@endforeach
						@endforeach	
			</div>
				@endif
			</div>
		</div>
	</main>
@endsection