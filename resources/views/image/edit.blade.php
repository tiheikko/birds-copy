@extends('templates.admin_header')

@section('admin_main_content')

	<a href="{{ route('dashboard') }}">Назад</a>

	<h2>Изменение картинки</h2>

	<div class="edit_image__block">
		
		<form action="{{ route('image.update', $image->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')

			<label for="order_id"> Отряд: </label>
			<select name="order_id" onchange="selectOrder()">
				<option value="{{$image->species->order_id}}" class="{{ $image->species->order->latin_name }}">{{$image->species->order->name}}</option>
				
				@foreach($orders as $order)
					@if($order->id != $image->species->order_id)
						<option value="{{ $order->id }}" class="{{ $order->latin_name }}"> {{ $order->name }}</option>
					@endif
				@endforeach
			</select>


			<label for="family_id"> Семейство: </label>
			<select name="family_id" onchange="selectFamily()">
				<option value="{{ $image->species->family_id }}" class="{{ $image->species->order->latin_name }} {{$image->species->family->latin_name}}"> {{$image->species->family->name}}</option>
				
				@foreach($families as $family)
					@if($family->id != $image->species->family_id)
						<option value="{{ $family->id }}" class="{{ $family->order->latin_name }} {{$family->latin_name}}"> {{ $family->name }} </option>
					@endif
				@endforeach
			</select>


			<label for="genus_id"> Род: </label>
			<select name="genus_id" onchange="selectGenus()">
				<option value="{{ $image->species->genus_id }}" class="{{ $image->species->order->latin_name }} {{ $image->species->family->latin_name }} {{ $image->species->genus->latin_name }}"> {{$image->species->genus->name}} </option>
				
				@foreach($genera as $genus)
					@if($genus->id != $image->species->genus_id)
						<option value="{{ $genus->id }}" class="{{ $genus->order->latin_name }} {{ $genus->family->latin_name }} {{ $genus->latin_name }}"> {{ $genus->name }} </option>
					@endif
				@endforeach
			</select>

			<label for="species_id">Вид: </label>
			<select name="species_id">
				<option value="{{ $image->species->id }}" class="{{ $image->species->order->latin_name }} {{ $image->species->family->latin_name }} {{ $image->species->genus->latin_name }}">{{$image->species->name}}</option>

				@foreach($species as $species)
					@if($species->id != $image->species->id)
						<option value="{{ $species->id }}" class="{{ $species->order->latin_name }} {{ $species->family->latin_name }} {{ $species->genus->latin_name }}">{{ $species->name }}</option>
					@endif
				@endforeach
			</select>

			<input type="file" name="img">

			<button type="submit" class="submit__button">Изменить</button>

		</form>


		<div>
			<h3>Текущая картинка</h3>
			<img src="{{ asset('/public/' .  $image->img_url) }}" alt="{{ $image->species->name }}">
		</div>
	</div>

@endsection