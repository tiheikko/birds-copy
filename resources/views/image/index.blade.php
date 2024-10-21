@extends('templates.admin_header')

@section('admin_main_content')

	<a href="{{ route('dashboard') }}">Назад</a>

	<h2>Изменение или удаление картинок</h2>

	<div class="images">
		@foreach($images as $image)
			<div>
				<img src="{{ asset('/public/' .  $image->img_url) }}" alt="{{ $image->species->name }}">

				<form action="{{ route('image.edit', $image->id)}}" class="edit_img">
					@csrf

					<button type="submit"><i class="fa-solid fa-pencil"></i></button>	
				</form>

				<form action="{{ route('image.destroy', $image->id)}}" method="post" class="delete_img">
					@csrf
					@method('delete')

					<button type="submit"><i class="fa-solid fa-trash"></i></button>	
				</form>

				<div class="description">
					<span> {{ $image->species->name }} </span>
				</div>
			</div>
		@endforeach
	</div>

@endsection