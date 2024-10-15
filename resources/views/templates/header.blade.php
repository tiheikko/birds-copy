<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Птицы Псковской области</title>

		
		<link rel="stylesheet" href="{{ asset('/resources/css/gallery.css') }}">
		<link rel="stylesheet" href="{{ asset('/resources/css/fontawesome-free-6.4.0-web/css/all.min.css') }}">
		
		
		
	</head>

	<body>
		<header>
			<a href="{{ route('gallery.index') }}" class="logo">
				<span class="bird_icon"><i class="fa-solid fa-dove fa-flip-horizontal"></i></i></span>

				<span>Птицы</span>
				<span>Псковской области</span>
			</a>

			<div class="search__block">
				<form action="{{ route('search') }}">
					@csrf
					
					<input type="text" name="search" placeholder="Поиск птиц...">
				</form>

				<div>
					<i class="fa-solid fa-magnifying-glass"></i>
				</div>
			</div>
		</header>

		<nav>
			<a class="all__category" href="{{ route('gallery.index') }}"> Все </a>
			<a class="rare__category" href="{{ route('gallery_rare.index') }}"> Редкие </a>
			<a class="red_list__category" href="{{ route('gallery_red_list.index') }}"> Красная книга </a> 
			<a class="classification__category" href="{{ route('gallery_classification.index') }}"> Классификация </a>
		</nav>
		
		<main>

			<div class="wrapper">

		
				@yield('main_content')

	</body>

	@extends('plugins.select_category')

</html>