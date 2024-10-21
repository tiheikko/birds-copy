@extends('templates.admin_header')

@section('admin_main_content')
		
		<a href="{{ route('dashboard')}}"> Назад </a>
		<h2>Изменение или удаление рода</h2>

		<div class="links">
			@foreach($genera as $genus)
				<a href="{{ route('genus.edit', $genus->id) }}"> {{ $genus->name }} </a>
			@endforeach
		</div>


@endsection('admin_main_content')