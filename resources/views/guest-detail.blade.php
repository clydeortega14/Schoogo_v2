@extends('layouts.landing')

@section('title', 'Guest Detail')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Guest Detail</h1>
			<hr>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="">Price Calculation</a></li>
					<li class="breadcrumb-item"><a href="">Upload Artwork</a></li>
					<li class="breadcrumb-item"><a href="">Product Information</a></li>
					<li class="breadcrumb-item active" aria-current="page">Billing Information</li>
				</ol>
			</nav>
		</div>
	</div>
	
	<form action="{{ route('order.now', $pricing->id) }}" method="POST" enctype="multipart/form-data">

		@csrf
		<div class="row">
			<div class="col-md-12">
				<h5>Delivery Address</h5>
				<hr>
			</div>
			
			@include('partials.guest._details')

			<div class="col-xs-12 col-md-4">
				{{-- <h3>Order Summary</h3> --}}
				<ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center active">
				   	Order Summary
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Artwork
				    <span>
				    	<img src="{{ asset('storage/files/documents/'.$session[0]) }}" alt="" class="img-fluid mx-auto d-block" height="100" width="100">
				    </span>
				    <input type="hidden" name="product_id" value="">
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Product
				    <span>{{ $pricing->product->name }}</span>
				    <input type="hidden" name="product_id" value="">
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Category
				    <span>{{ $pricing->categories->name }}</span>
				    <input type="hidden" name="product_id" value="">
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Size
				    <span>{{ $pricing->sizes->size }}</span>
				    <input type="hidden" name="size" value="">
				  </li>

				  <li class="list-group-item d-flex justify-content-between align-items-center">
				   Quantity
				    <span>{{ $pricing->quantity }}</span>
				    <input type="hidden" name="quantity" value="">
				  </li>

				  <li class="list-group-item d-flex justify-content-end align-items-center">
				   	<h5>Total Price : PHP {{ $pricing->pricingFormattedPrice() }}</h5>
				   	<input type="hidden" name="price" value="">
				  </li>
				</ul>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-md-12">
				<p><strong class="text-danger">WARNING!</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius doloremque laborum sapiente libero autem necessitatibus blanditiis quisquam doloribus dolor molestias corporis a quam eum nisi, ea voluptate, praesentium iste saepe.</p>
			</div>

			<div class="col-md-12">
				<div class="float-right">
					<input type="checkbox" name="agreement" required> I agree to terms and conditions <a href="#"><u>Terms and Conditions</u></a>
				</div>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-md-12">
				<div class="float-right">
					<button type="submit" class="btn btn-info">Order Now</button>
				</div>
			</div>
		</div>
	</form>
	<hr>
</div>

@endsection