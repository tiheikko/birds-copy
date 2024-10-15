@extends('templates.admin_header')

@section('admin_main_content')
		
		<a href="{{ route('dashboard')}}"> Назад </a>
		<h2>Изменение или удаление семейства</h2>

		<div class="links">
			@foreach($families as $family)
				<a href="{{ route('family.edit', $family->id) }}"> {{ $family->name }} </a>
			@endforeach
		</div>


@endsection('admin_main_content')