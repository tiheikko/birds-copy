@extends('templates.admin_header')

@section('admin_main_content')

	<a href="{{ route('dashboard') }}">Назад</a>

	<h2>Добавление картинки</h2>

	<form class="create_image" action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<label for="order_id"> Отряд: </label>
		<select name="order_id" onchange="selectOrder()">
			<option value="0" style="display: none;">Выбрать отряд</option>
			
			@foreach($orders as $order)
				<option value="{{ $order->id }}" class="{{ $order->latin_name }}"> {{ $order->name }}</option>
			@endforeach
		</select>


		<label for="family_id"> Семейство: </label>
		<select name="family_id" onchange="selectFamily()" disabled>
			<option value="0" style="display: none;">Выбрать семейство</option>
			
			@foreach($families as $family)
				<option value="{{ $family->id }}" class="{{ $family->order->latin_name }} {{$family->latin_name}}"> {{ $family->name }} </option>
			@endforeach
		</select>


		<label for="genus_id"> Род: </label>
		<select name="genus_id" class="choose_for_typing" onchange="selectGenus()" disabled>
			<option value="0" style="display: none;">Выбрать род</option>
			
			@foreach($genera as $genus)
				<option value="{{ $genus->id }}" class="{{ $genus->order->latin_name }} {{ $genus->family->latin_name }} {{ $genus->latin_name }}"> {{ $genus->name }} </option>
			@endforeach
		</select>

		<label for="species_id">Вид: </label>
		<select name="species_id" disabled>
			<option style="display: none;">Выбрать вид</option>
			@foreach($species as $species)
				<option value="{{ $species->id }}" class="{{ $species->order->latin_name }} {{ $species->family->latin_name }} {{ $species->genus->latin_name }}">{{ $species->name }}</option>
			@endforeach
		</select>

		<input type="file" name="img">

		<button type="submit" class="submit__button">Создать</button>

	</form>


	<h3>Статистика:</h3>

	<div>
		@foreach($orders as $order)
			<p class="see_more{{ $order->id }}" onclick="showPointers(this)">{{ $order->name }}({{ $order->latin_name}})</p>

			<ul>
				@foreach($order->species as $species)
					<li> {{ $species->name}}({{ $species->latin_name}}) — {{ $species->images->count() }}
						@if($species->images->count() % 10 == 0 ||
							$species->images->count() % 10 > 4 && 
							$species->images->count() % 10 < 10)
							картинок
						@elseif($species->images->count() % 10 == 1)
							картинка
						@else
							картинки
						@endif
					</li>
				@endforeach
			</ul>
		@endforeach
	</div>

@endsection