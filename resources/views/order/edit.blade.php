@extends('templates.admin_header')

@section('admin_main_content')


	<a href="{{ route('order.index') }}" class="go_back">Назад</a>

	<h2>Изменение или удаление отряда</h2>

	<form action="{{ route('order.update', $order->id) }}" method="post">
		@csrf
		@method('patch')
		
		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название отряда..." value="{{ $order->name }}">
		
		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название отряда..." value="{{ $order->latin_name }}">
		
		<button type="submit" class="submit__button">Изменить</button>
	</form>

	<form action="{{ route('order.destroy', $order->id) }}" method="post">
		@csrf
		@method('delete')

		<button type="submit" class="delete__button">Удалить</button>
		
	</form>

@endsection('admin_main_content')