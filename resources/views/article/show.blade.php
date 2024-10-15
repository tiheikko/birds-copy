@extends('templates.admin_header')

@section('admin_main_content')
		
		<a href="{{ route('dashboard')}}"> Назад </a>
		<h2>Изменение или удаление статей</h2>

		<div class="links">
			@foreach($articles as $article)
				<a href="{{ route('article.edit', $article->id) }}"> {{ $article->species->name }} </a>
			@endforeach
		</div>


@endsection('admin_main_content')