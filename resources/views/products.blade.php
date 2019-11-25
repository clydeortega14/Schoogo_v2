@extends('layouts.landing')

@section('title', 'Products')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if(session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success!</strong> {{ session('success') }}.
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    	<span aria-hidden="true">&times;</span>
				  	</button>
				</div>
			@endif
		</div>

		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12">
					<h1>Products</h1>
					<hr>
				</div>
			</div>
			<div class="row">
				@foreach($products as $product)
					<div class="col-sm-4 py-2">
						<div class="card h-100">
							<a href="{{ route('product.categories', $product->id) }}">
								<img src="{{ $product->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('/uploads/images/products/'. $product->image) }}" alt="..." class="card-img-top" width="300" height="200">
							</a>
							<div class="card-body">
								
								<h5 class="card-title">{{ $product->name }}</h5>
								<p class="card-text">{{ $product->description}}</p>
							</div>
							<div class="card-footer">
								<a href="{{ route('product.categories', $product->id) }}" class="btn btn-primary btn-block">See Details</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<br>	
		</div>
	</div>
</div>
@endsection