@extends('templates.admin_header')

@section('admin_main_content')


	<a href="{{ route('dashboard') }}" class="go_back">Назад</a>
	<h2>Создание семейства</h2>
	<form action="{{ route('family.store') }}" method="post">
		@csrf

		<label for="order_id"> Отряд: </label>
		<select name="order_id" class="choose_for_typing" onchange="allowTyping()">
				<option value="0" style="display: none;">Выбрать отряд</option>
			@foreach($orders as $order)
				<option value="{{ $order->id }}"> {{ $order->name }} </option>
			@endforeach
		</select>

		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название семейства..." disabled>
		
		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название семейства..." disabled>
		
		<button type="submit" class="submit__button">Создать</button>
	</form>

	<div>
		<h3>Существующие семейства:</h3>
		<ul class="show">
			@foreach($families as $family)
				<li>{{ $family->name }}({{ $family->latin_name }})</li>
			@endforeach
		</ul>
	</div>

@endsection('admin_main_content')