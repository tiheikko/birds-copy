@extends('templates.admin_header')

@section('admin_main_content')
		
		<a href="{{ route('dashboard')}}"> Назад </a>
		<h2>Изменение или удаление вида</h2>

		<div class="links">
			@foreach($species as $species)
				<a href="{{ route('species.edit', $species->id) }}"> {{ $species->name }} </a>
			@endforeach
		</div>


@endsection('admin_main_content')