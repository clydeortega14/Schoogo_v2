@extends('layouts.landing')

@section('title', 'Home Page')

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

		<div class="col-sm-4">
			<div class="list-group nav nav-tabs">
			  	<a href="#all-categories" class="list-group-item list-group-item-action active" data-toggle="tab">
			  		Products
			  	</a>
				@foreach($products as $product)
				  	<a href="#{{ $product->name }}" class="list-group-item list-group-item-action" data-toggle="tab">
				  		<i class="fa fa-book"></i>
				  		<span>{{ $product->name }}</span>
				  	</a>
			  	@endforeach
			</div>
		</div>

		<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-12">
					<h5>Products</h5>
					<hr>
				</div>
			</div>
			<div class="row">
				@foreach($products as $product)
					<div class="col-sm-4 py-2">
						<div class="card h-100">
							<a href="{{ route('display.product', $product->id) }}">
								<img src="/img/portfolio/thumbnails/1.jpg" alt="..." class="card-img-top" width="100" height="100">
							</a>
							<div class="card-body">
								
								<h5 class="card-title">{{ $product->name }}</h5>
								<p class="card-text">{{ $product->description}}</p>
							</div>
							<div class="card-footer">
								<a href="{{ route('display.product', $product->id) }}" class="align-center">See Details</a>
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