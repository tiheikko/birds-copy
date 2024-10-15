@extends('templates.admin_header')

@section('admin_main_content')


	<a href="{{ route('family.index') }}" class="go_back">Назад</a>

	<h2>Изменение или удаление семейства</h2>

	<form action="{{ route('family.update', $family->id) }}" method="post">
		@csrf
		@method('patch')

		<label for="order_id">Отряд: </label>
		<select name="order_id">
			<option value="{{ $family->order_id }}"> {{ $family->order->name}} </option>

			@foreach($orders as $order)
				@if($order->id != $family->order_id)
					<option value="{{ $order->id }}"> {{ $order->name }} </option>
				@endif
			@endforeach
		</select>
		
		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название семейства..." value="{{ $family->name }}">
		
		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название семейства..." value="{{ $family->latin_name }}">
		
		<button type="submit" class="submit__button">Изменить</button>
	</form>

	<form action="{{ route('family.destroy', $family->id) }}" method="post">
		@csrf
		@method('delete')

		<button type="submit" class="delete__button">Удалить</button>
		
	</form>

@endsection('admin_main_content')