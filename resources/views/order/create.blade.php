@extends('templates.admin_header')

@section('admin_main_content')


	<a href="{{ route('dashboard') }}" class="go_back">Назад</a>
	<h2>Создание отряда</h2>
	<form action="{{ route('order.store') }}" method="post">
		@csrf
		
		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название отряда...">
		
		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название отряда...">
		
		<button type="submit" class="submit__button">Создать</button>
	</form>

	<div>
		<h3>Существующие отряды:</h3>
		<ul class="show">
			@foreach($orders as $order)
				<li>{{ $order->name }}({{ $order->latin_name }})</li>
			@endforeach
		</ul>
	</div>



@endsection('admin_main_content')