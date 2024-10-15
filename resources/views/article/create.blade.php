@extends('templates.admin_header')

@section('admin_main_content')

	<a href="{{ route('dashboard') }}">Назад</a>

	<h2>Добавление статьи</h2>

	<form class="create_article" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<h3>Классификация</h3>

		<label for="species_id">Вид: </label>
		<select name="species_id">
			<option style="display: none;">Выбрать вид</option>
			@foreach($species as $species)
				<option value="{{ $species->id }}" class="{{ $species->order->latin_name }} {{ $species->family->latin_name }} {{ $species->genus->latin_name }}">{{ $species->name }}</option>
			@endforeach
		</select>

		<label for="voice_audio">Загрузить голос птицы</label>
		<input type="file" name="voice_audio">


		<h3>Общая информация</h3>

		<textarea name="general_info" placeholder="Кратко опишите птицу"></textarea>


		<h3>Внешний вид</h3>
		<h4>Строение</h4>
		<textarea name="appearance" placeholder="Строение птицы"></textarea>
		<label for="voice_audio">Загрузить доп. изображение с птицей</label>
		<input type="file" name="appearance_img">
		<label for="voice_audio">Подпись к картинке: </label>
		<input type="text" name="appearance_img_note">

		<h4>Голос</h4>
		<textarea name="voice_description" placeholder="Характеристики голоса и пения"></textarea>

		<h4>Распространение</h4>
		<textarea name="habitat" placeholder="Ареал обитания"></textarea>
		<label for="voice_audio">Загрузить картинку с ареалом обитания</label>
		<input type="file" name="habitat_img">
		<label for="habitat_img_note">Подпись к картинке: </label>
		<input type="text" name="habitat_img_note">

		<h3>Образ жизни</h3>
		<textarea name="behavior" placeholder="Поведение птицы"></textarea>
		<h4>Питание</h4>
		<textarea name="feeding" placeholder="Питание птицы"></textarea>
		<label for="feeding_img">Загрузить изображение с питанием птицы</label>
		<input type="file" name="feeding_img">
		<label for="feeding_img_note">Подпись к картинке: </label>
		<input type="text" name="feeding_img_note">

		<h4>Размножение</h4>
		<textarea name="breeding" placeholder="Размножение птицы"></textarea>
		<label for="breeding_img">Загрузить изображение с половым диморфизмом</label>
		<input type="file" name="breeding_img">
		<label for="breeding_img_note">Подпись к картинке: </label>
		<input type="text" name="breeding_img_note">

		<button type="submit" class="submit__button">Создать</button>

	</form>


@endsection