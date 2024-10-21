<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>

		<link rel="stylesheet" href="{{asset('/resources/css/admin.css')}}">

        <link href="https://unpkg.com/croppie/croppie.css" rel="stylesheet">

		<script src="https://kit.fontawesome.com/407dedc4b6.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	</head>

	<body>
		<nav>
			<a href="{{route('dashboard')}}">Admin</a>

			<form action="{{route('logout')}}" method="post">
				@csrf
				<button type="submit" class="logout__button">Выйти</button>
			</form>
		</nav>

		<main>
			<div class="wrapper">
				@yield('admin_main_content')
			</div>
		</main>


	@extends('plugins.see_more__script')

	@extends('plugins.select_order')
	@extends('plugins.select_family')
	@extends('plugins.select_genus')
	@extends('plugins.allow_typing')

    @extends('plugins.crop_img')
	</body>

</html>
