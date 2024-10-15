@extends('templates.header')

@section('main_content')
			
			@if($article == null)
				<h1>Упс! Статья еще не написана :(</h1>
			@else
				<div class="article">
					<h1>{{ $species->name }}</h1>
					<div class="article_card">
						<h3>{{ $species->name }}</h3>
						<img src="{{ asset('/public/' .  $main_img->img_url) }}">
						<h3>Классификация</h3>
						<div>
							<p>Отряд: </p>
							<form action="{{route('gallery.order', $species->order->latin_name)}}">
					 			@csrf
					 		
					 			<button type="submit" name="order" value="{{ $species->order->id }}"> {{ $species->order->name }} </button>
					 		</form>

							<p>Семейство: </p>
							<form action="{{route('gallery.family', $species->family->latin_name)}}">
					 			@csrf
					 		
					 			<button type="submit" name="family" value="{{ $species->family->id }}"> {{ $species->family->name }}</button>
					 		</form>

							<p>Род: </p>
							<form action="{{route('gallery.genus', $species->genus->latin_name)}}">
					 			@csrf
					 		
					 			<button type="submit" name="genus" value="{{ $species->genus->id }}"> {{ $species->genus->name }}</button>
					 		</form>

							<p>Вид: </p> 
							<form>
								<p>{{ $species->name }}</p>
							</form>
						</div>

						@if($article->voice_audio != null)
							<h3>Голос</h3>
							<audio controls src="{{ asset('/public/' . $article->voice_audio) }}"></audio>
						@endif
					</div>

					<div class="article_info">
						<p>{{ $article->general_info }}</p>

						<br>
						<h2>Описание</h2>

						<h3>Внешний вид</h3>
						@if($article->appearance_img != null)
							<figure class="article_img_right">
								<img src="{{ asset('/public/' .  $article->appearance_img) }}">
								<figcaption>{{ $article->appearance_img_note }}</figcaption>
							</figure>
						@endif
						<p> {{ $article->appearance }} </p>
						


						<h3>Голос</h3>
						<p> {{ $article->voice_description }} </p>

						<h3>Питание</h3>
						@if($article->feeding_img != null)
							<figure class="article_img_left">
								<img src="{{ asset('/public/' .  $article->feeding_img) }}">
								<figcaption>{{ $article->feeding_img_note }}</figcaption>
							</figure>
						@endif
						<p>{{ $article->feeding }} </p>

						<h3>Размножение</h3>
						@if($article->breeding_img != null)
							<figure class="article_img_right">
								<img src="{{ asset('/public/' .  $article->breeding_img) }}">
								<figcaption>{{ $article->breeding_img_note }}</figcaption>
							</figure>
						@endif
						<p>{{ $article->breeding }}</p>
						
						<br>
						<h2>Распространение</h2>
						@if($article->habitat_img != null)
							<figure class="article_img_left">
								<img src="{{ asset('/public/' .  $article->habitat_img) }}">
								<figcaption>{{ $article->habitat_img_note }}</figcaption>
							</figure>
						@endif
						<p> {{ $article->habitat }} </p>
					</div>
				</div>
			@endif

		</div>
	</main>

@endsection('main_content')