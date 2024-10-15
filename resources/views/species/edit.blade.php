@extends('templates.admin_header')

@section('admin_main_content')


	<a href="{{ route('species.index') }}" class="go_back">Назад</a>

	<h2>Изменение или удаление вида</h2>

	<form action="{{ route('species.update', $species->id) }}" method="post">
		@csrf
		@method('patch')

		<label for="order_id"> Отряд: </label>
		<select name="order_id" onchange="selectOrder()">
			<option value="{{ $species->order_id }}" class="{{ $species->order->latin_name }}" selected> {{ $species->order->name }} </option>
			
			@foreach($orders as $order)
				@if($order->id != $species->order_id)
					<option value="{{ $order->id }}" class="{{ $order->latin_name }}"> {{ $order->name }}</option>
				@endif
			@endforeach
		</select>


		<label for="family_id"> Семейство: </label>
		<select name="family_id" onchange="selectFamily()">
			<option value="{{ $species->family_id }}" class="{{ $species->order->latin_name }} {{ $species->family->latin_name }}"> {{ $species->family->name }} </option>
			
			@foreach($families as $family)
				@if($family->id != $species->family_id)
					<option value="{{ $family->id }}" class="{{ $family->order->latin_name }} {{ $family->latin_name }}"> {{ $family->name }}</option>
				@endif
			@endforeach
		</select>


		<label for="genus_id"> Род: </label>
		<select name="genus_id" class="choose_for_typing">
			<option value="{{ $species->genus_id }}"> {{ $species->genus->latin_name }} </option>
			
			@foreach($genera as $genus)
				@if($genus->id != $species->genus_id)
					<option value="{{ $genus->id }}" class="{{ $genus->order->latin_name }} {{ $genus->family->latin_name }}"> {{ $genus->name }} </option>
				@endif
			@endforeach
		</select>


		<label for="name"> Название: </label>
		<input type="text" name="name" placeholder="Введите название вида..." value="{{ $species->name}}">

		<label for="latin_name">Латинское название: </label>
		<input type="text" name="latin_name" placeholder="Введите латинское название вида..." value="{{ $species->latin_name}}">



		<label for="rare"> Редкая птица? </label>
		<select name="rare">
			@if($species->rare == 0)
				<option value="0">нет</option>
				<option value="1">да</option>
			@else
				<option value="1">да</option>
				<option value="0">нет</option>
			@endif
		</select>


		<label for="red_list">В красной книге? </label>
		<select name="red_list">
			@if($species->red_list == 0)
				<option value="0">нет</option>
				<option value="1">да</option>
			@else
				<option value="1">да</option>
				<option value="0">нет</option>
			@endif
		</select>

		<button type="submit" class="submit__button">Изменить</button>
	</form>



	<form action="{{ route('species.destroy', $species->id) }}" method="post">
		@csrf
		@method('delete')

		<button type="submit" class="delete__button">Удалить</button>
		
	</form>

@endsection('admin_main_content')