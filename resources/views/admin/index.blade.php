@extends('templates.admin_header')

@section('admin_main_content')
	<div class="adding">
		<p class="see_more1" onclick="showPointers(this)">Добавить...</p>
		<ul>
			<li> <a href="{{route('order.create')}}">Отряд</a> </li>
			<li> <a href="{{route('family.create')}}">Семейство</a> </li>
			<li> <a href="{{route('genus.create')}}">Род</a> </li>
			<li> <a href="{{route('species.create')}}">Вид</a> </li>
			<li> <a href="{{route('image.create')}}">Картинка</a> </li>
			<li> <a href="{{route('article.create')}}">Статья</a> </li>
		</ul>
	</div>

	<div class="changing">
		<p class="see_more2" onclick="showPointers(this)">Изменить или удалить...</p>
		<ul>
			<li> <a href="{{route('order.index')}}">Отряд</a> </li>
			<li> <a href="{{route('family.index')}}">Семейство</a> </li>
			<li> <a href="{{route('genus.index')}}">Род</a> </li>
			<li> <a href="{{route('species.index')}}">Вид</a> </li>
			<li> <a href="{{route('image.index')}}">Картинка</a> </li>
			<li> <a href="{{route('article.show')}}">Статья</a> </li>
		</ul>
	</div>


@endsection