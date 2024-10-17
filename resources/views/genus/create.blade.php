@extends('templates.admin_header')

@section('admin_main_content')

	<a href="{{ route('dashboard') }}" class="go_back">Назад</a>
	<h2>Создание рода</h2>


	<form action="{{ route('genus.store') }}" method="post">
		@csrf

		<label for="order_id"> Отряд: </label>
		<select name="order_id" onchange="selectOrder()">
			<option value="0" style="display: none;">Выбрать отряд</option>
			
			@foreach($orders as $order)
			<option value="{{ $order->id }}" class="{{ $order->latin_name }}"> {{ $order->name }}</option>
			@endforeach
		</select>


		<label for="family_id"> Семейство: </label>
		<select name="family_id" class="choose_for_typing" onchange="allowTyping()" disabled>
			<option value="0" style="display: none;">Выбрать семейство</option>
			
			@foreach($families as $family)
			<option value="{{ $family->id }}" class="{{ $family->order->latin_name }} {{$family->latin_name}}"> {{ $family->name }} </option>
			@endforeach
		</select>


		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название рода..." disabled>


		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название рода..." disabled>
		
		<button type="submit" class="submit__button">Создать</button>
	</form>

	<div>
		<h3>Существующие рода:</h3>
		<ul class="show">
			@foreach($genera as $genus)
			<li>{{ $genus->name }}({{ $genus->latin_name }})</li>
			@endforeach
		</ul>
	</div>


@endsection('admin_main_content')