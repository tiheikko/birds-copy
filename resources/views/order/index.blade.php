@extends('templates.admin_header')

@section('admin_main_content')
		
		<a href="{{ route('dashboard')}}"> Назад </a>
		<h2>Изменение или удаление отряда</h2>

		<div class="links">
			@foreach($orders as $order)
				<a href="{{ route('order.edit', $order->id) }}"> {{ $order->name }} </a>
			@endforeach
		</div>


@endsection('admin_main_content')