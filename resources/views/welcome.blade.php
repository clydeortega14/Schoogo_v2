@extends('layouts.landing')

@section('title', 'Home Page')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="text-info">Products</h2>
			<hr>
		</div>
		@foreach($products as $product)
			<div class="col-sm-4 py-2">
				<div class="card h-100">
					<a href="{{ route('view.product', $product->id) }}">
						<img src="/img/portfolio/thumbnails/1.jpg" alt="..." class="img-fluid mx-auto d-block" height="250" width="250">
					</a>
					<div class="card-body">
						<h3 class="card-title">{{ $product->name }}</h3>
						<p class="card-text">{{ $product->description}}</p>
						
					</div>
					<div class="card-footer">
						<a href="{{ route('view.product', $product->id) }}" class="align-center">view more</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection