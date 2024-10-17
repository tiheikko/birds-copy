@extends('templates.header')

@section('main_content')
		<span class="classification__category"></span hidden>
			
		<h2> {{ $name }}({{ $latin_name }}) </h2>

		<div class="images">
			@foreach($species as $species)
				@foreach($species->images as $image)
					<a href="{{ route('article.index', $image->species_id) }}" class="show
					@if($image->species->rare == 1)
						rare
					@endif
					@if($image->species->red_list == 1)
						red_list
					@endif
					">
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
					</a>
				@endforeach	
			@endforeach
		</div>

	</div>
	
</main>
@endsection