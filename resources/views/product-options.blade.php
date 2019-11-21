@extends('layouts.landing')

@section('title', 'Product Options')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h5>Review Order</h5>
		</div>
	</div>
	<hr>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Price Calculation</a></li>
			<li class="breadcrumb-item"><a href="#">Upload Design</a></li>
			<li class="breadcrumb-item active" aria-current="page">Product Information</li>
		</ol>
	</nav>
	{{-- <form action="{{ route('') }}" method="POST"> --}}
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="card">

					<div class="card-body">
						<img src="{{ asset('/uploads/files/documents/'. $sessionData[0])}}" alt="" class="img-fluid mx-auto d-block" height="200" width="200">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<h5>Product Information</h5>
				<hr>
				
				<div class="form-group row">
					<label for="size" class="col-md-4 col-form-label text-md-right">Product Name</label>

					<div class="col-md-8">
						<label style="margin-top: 7px;">{{ $product->name }}</label>
						<input type="hidden" id="prod-id" value="{{ $product->id}}">
					</div>
				</div>

				<div class="form-group row">
					<label for="category-id" class="col-md-4 col-form-label text-md-right"> Category </label>
					<div class="col-md-8">
						<label style="margin-top: 7px;">{{ $category->name }}</label>
						<input type="hidden" id="category-id" value="{{ $category->id}}">
					</div>
				</div>

				<div class="form-group row">
					<label for="size" class="col-md-4 col-form-label text-md-right">Size</label>
					<div class="col-md-8">
						<label style="margin-top: 7px;">{{ $size->size }}</label>
						<input type="hidden" id="size" value="{{ $size->id}}">
					</div>
				</div>

				<div class="form-group row">
					<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
					<div class="col-md-8">
						<label style="margin-top: 7px;">{{ $sessionData['quantity'] }}</label>
						<input type="hidden" id="quantity" value="{{ $sessionData['quantity']}}">
					</div>				
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="float-right">
							<h5>Subtotal :
								PHP <span class="prod_price"> {{ $sessionData['price']}} </span>
								<input type="hidden" name="price" class="prod_price">
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<p> <strong class="text-danger">WARNING ! </strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, numquam maiores quis! Iusto tenetur, expedita explicabo dolorem fugit ad, inventore voluptas at architecto minus corporis dignissimos nisi tempore doloribus laudantium.</p>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-md-6">
				<div class="float-right">
					<input type="checkbox"> I agree to terms and conditions
				</div>
			</div>
		</div>
		<br>
		<div class="row justify-content-end">
			<div class="col-md-4">
				<div class="float-right">
					<a href="{{ route('order.checkout') }}" class="btn btn-info btn-block">Continue to checkout</a>
				</div>
			</div>
		</div>
</div>

@endsection