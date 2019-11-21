@extends('layouts.landing')

@section('title', 'Product Categories')

@section('content')

<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1>{{ $product->name }}</h1>
				<input type="hidden" id="prod-id" value="{{ $product->id }}">
				<input type="hidden" name="product_id" value="{{ $product->id }}">
				<hr>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						{{-- <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li> --}}
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Products</a></li>
						<li class="breadcrumb-item active" aria-current="page">Product Categories</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row justify-content-center">
			@foreach($product->categories as $category)
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 py-2">
					<div class="card h-100">
						<a href="{{ url('/price-calculation/'.$product->id.'/'.$category->id) }}">
							<img src="{{ $category->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('/uploads/images/categories/'.$category->image)  }}" alt="..." class="mx-auto d-block img-fluid">
						</a>
						<div class="card-body">
							
							<h6 class="card-title">{{ $category->name }}</h6>
						</div>
						<div class="card-footer">
							<a href="{{ url('/price-calculation/'.$product->id.'/'.$category->id) }}" class="btn btn-outline-info">Select Category</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		
		<br>
	</div>

@endsection

@include('partials.scripts.information')