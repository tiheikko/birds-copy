@extends('templates.header')

@section('main_content')
			<span class="rare__category"></span hidden>

			<div class="images">
				@foreach($images as $image)
					@if($image->species->rare == 1)
						<a href="{{ route('article.index', $image->species_id) }}">
							<img src="{{ asset('/public/' . $image->img_url) }}">

							<div class="description">
								<span> {{ $image->species->name }} </span>
								<span class="latin_name"> <i> {{ $image->species->latin_name }} </i> </span>

								<div class="notes">
									<span class="rare"> <i class="fa-solid fa-circle"></i> Редкий</span>

									@if($image->species->red_list == 1)
										<span class="red_list"> <i class="fa-solid fa-circle"></i> Красная книга</span>
									@endif
								</div>
							</div>
						</a>
					@endif
				@endforeach	
			</div>
			



		</div>
	</main>

@endsection('main_content')