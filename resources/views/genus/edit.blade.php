@extends('templates.admin_header')

@section('admin_main_content')


	<a href="{{ route('genus.index') }}" class="go_back">Назад</a>

	<h2>Изменение или удаление рода</h2>

	<form action="{{ route('genus.update', $genus->id) }}" method="post">
		@csrf
		@method('patch')

		<label for="order_id">Отряд: </label>
		<select name="order_id" onchange="selectOrder()">
			<option value="{{ $genus->order_id }}" class="{{ $genus->order->latin_name }}"> {{ $genus->order->name}} </option>

			@foreach($orders as $order)
				@if($order->id != $genus->order_id)
					<option value="{{ $order->id }}" class="{{ $order->latin_name }}"> {{ $order->name }} </option>
				@endif
			@endforeach
		</select>


		<label for="family_id">Семейство: </label>
		<select name="family_id">
			<option value="{{ $genus->family_id }}" class="{{ $genus->order->latin_name }} {{ $genus->family->latin_name }}"> {{ $genus->family->name}} </option>

			@foreach($families as $family)
				@if($family->id != $genus->family_id)
					<option value="{{ $family->id }}" class="{{ $family->order->latin_name }} {{ $family->latin_name}}"> {{ $family->name }} </option>
				@endif
			@endforeach
		</select>


		
		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название отряда..." value="{{ $genus->name }}">
		
		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название отряда..." value="{{ $genus->latin_name }}">
		
		<button type="submit" class="submit__button">Изменить</button>
	</form>

	<form action="{{ route('genus.destroy', $genus->id) }}" method="post">
		@csrf
		@method('delete')

		<button type="submit" class="delete__button">Удалить</button>
		
	</form>

@endsection('admin_main_content')