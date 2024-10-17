@extends('templates.admin_header')

@section('admin_main_content')

	<a href="{{ route('dashboard') }}">Назад</a>

	<h2>Изменение статьи</h2>

	<div class="edit_article">
		<form class="create_article" action="{{ route('article.update', $info->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')

			<h3>Классификация</h3>

			<label for="species_id">Вид: </label>
			<p name="species_id" value="{{ $info->bird_id }}">{{ $info->bird_id }}</p>

			<label for="voice_audio">Загрузить голос птицы</label>
			<input type="file" name="voice_audio">


			<h3>Общая информация</h3>

			<textarea name="general_info" placeholder="Кратко опишите птицу">{{ $info->general_info }}</textarea>


			<h3>Внешний вид</h3>
			<h4>Строение</h4>
			<textarea name="appearance" placeholder="Строение птицы">{{ $info->appearance }}</textarea>
			<label for="voice_audio">Загрузить доп. изображение с птицей</label>
			<input type="file" name="appearance_img">
			<label for="voice_audio">Подпись к картинке: </label>
			<input type="text" name="appearance_img_note" value="{{ $info->appearance_img_note }}">

			<h4>Голос</h4>
			<textarea name="voice_description" placeholder="Характеристики голоса и пения"> {{ $info->voice_description }} </textarea>

			<h4>Распространение</h4>
			<textarea name="habitat" placeholder="Ареал обитания">{{ $info->habitat }}</textarea>
			<label for="voice_audio">Загрузить картинку с ареалом обитания</label>
			<input type="file" name="habitat_img">
			<label for="habitat_img_note">Подпись к картинке: </label>
			<input type="text" name="habitat_img_note" value="{{ $info->habitat_img_note }}">

			<h3>Образ жизни</h3>
			<textarea name="behavior" placeholder="Поведение птицы">{{ $info->behavior }}</textarea>
			<h4>Питание</h4>
			<textarea name="feeding" placeholder="Питание птицы">{{ $info->feeding }}</textarea>
			<label for="feeding_img">Загрузить изображение с питанием птицы</label>
			<input type="file" name="feeding_img">
			<label for="feeding_img_note">Подпись к картинке: </label>
			<input type="text" name="feeding_img_note" value="{{ $info->feeding_img_note }}">

			<h4>Размножение</h4>
			<textarea name="breeding" placeholder="Размножение птицы">{{ $info->breeding }}</textarea>
			<label for="breeding_img">Загрузить изображение с половым диморфизмом</label>
			<input type="file" name="breeding_img">
			<label for="breeding_img_note">Подпись к картинке: </label>
			<input type="text" name="breeding_img_note" value="{{ $info->breeding_img_note }}">

			<button type="submit" class="submit__button">Сохранить изменения</button>

		</form>

		<div class="exist_pics_audio">
			<h3>Загруженные медиа</h3>
			@if($info->voice_audio != null)
				<audio controls src="{{ asset('/public/' . $info->voice_audio) }}"></audio>
			@endif

			@if($info->appearance_img != null)
				<figure>
					<img src="{{ asset('/public/' . $info->appearance_img) }}">
					<figcaption>Картинка в пункте про внешний вид</figcaption>
				</figure>
			@endif

			@if($info->habitat_img != null)
				<figure>
					<img src="{{ asset('/public/' . $info->habitat_img) }}">
					<figcaption>Картинка в пункте про ареал</figcaption>
				</figure>
			@endif

			@if($info->feeding_img != null)
				<figure>
					<img src="{{ asset('/public/' . $info->feeding_img) }}">
					<figcaption>Картинка в пункте про питание</figcaption>
				</figure>
			@endif

			@if($info->breeding_img != null)
				<figure>
					<img src="{{ asset('/public/' . $info->breeding_img) }}">
					<figcaption>Картинка в пункте про размножение</figcaption>
				</figure>
			@endif
		</div>
	</div>



	<form action="{{ route('article.destroy', $info->id) }}" method="post">
		@csrf
		@method('delete')

		<button type="submit" class="delete__button">Удалить</button>
		
	</form>


@endsection