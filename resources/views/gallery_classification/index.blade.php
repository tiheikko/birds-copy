@extends('templates.header')

@section('main_content')
		<span class="classification__category"></span hidden>
	
		<div class="wrapper">
			<div class="classification__block">
				<h1>Отряды</h1>
				<div class="orders">
					@foreach($orders as $order)
					 	<form action="{{route('gallery.order', $order->latin_name)}}">
					 		@csrf
					 		
					 		<button type="submit" name="order" value="{{ $order->id }}"> {{ $order->name }}({{ $order->latin_name }}) </button>

					 	</form>
					@endforeach
				</div>


				<h1>Семейства</h1>
				<div class="families">
					@foreach($families as $family)
						<form action="{{route('gallery.family', $family->latin_name)}}">
					 		@csrf
					 		
					 		<button type="submit" name="family" value="{{ $family->id }}"> {{ $family->name }}({{ $family->latin_name }}) </button>

					 	</form>
					@endforeach
				</div>


				<h1>Рода</h1>
				<div class="genera">
					@foreach($genera as $genus)
						<form action="{{route('gallery.genus', $genus->latin_name)}}">
					 		@csrf
					 		
					 		<button type="submit" name="genus" value="{{ $genus->id }}"> {{ $genus->name }}({{ $genus->latin_name }}) </button>

					 	</form>
					@endforeach
				</div>

			</div>
		</div>
	</main>
@endsection