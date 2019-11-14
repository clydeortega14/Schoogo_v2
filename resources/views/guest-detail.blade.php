@extends('layouts.landing')

@section('title', 'Guest Detail')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>Guest Detail</h4>
			<hr>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ url('/display-product/'.$orderData['product_id']) }}">Inquiry</a></li>
					<li class="breadcrumb-item active" aria-current="page">Billing Information</li>
				</ol>
			</nav>
		</div>
	</div>
	
	<form action="{{ route('order.now') }}" method="POST" enctype="multipart/form-data">

		@csrf
		<div class="row">
			<div class="col-md-12">
				<h5>Delivery Address</h5>
				<hr>
			</div>
			
			@include('partials.guest._details')

			<div class="col-xs-12 col-md-4">
				<div class="card">
					<div class="card-header">
						Upload Your Artwork
					</div>

					<div class="card-body">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<div class="form-group">
									<input type="file" name="file" id="file" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center active">
				   	Order Summary
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Product
				    <span>{{ $sessionData['product'] }}</span>
				    <input type="hidden" name="product_id" value="{{ $orderData['product_id'] }}">
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Size
				    <span>{{ $sessionData['size'] }}</span>
				    <input type="hidden" name="size" value="{{ $orderData['size_id'] }}">
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				   	Paper Type
				    <span>{{ $sessionData['paper'] }}</span>
				    <input type="hidden" name="paper_id" value="{{ $orderData['paper_id'] }}">
				  </li>

				  <li class="list-group-item d-flex justify-content-between align-items-center">
				   Quantity
				    <span>{{ $sessionData['quantity'] }}</span>
				    <input type="hidden" name="quantity" value="{{ $orderData['quantity'] }}">
				  </li>

				  <li class="list-group-item d-flex justify-content-end align-items-center">
				   	<h5>Total Price : PHP {{ number_format($orderData['price'], 2) }}</h5>
				   	<input type="hidden" name="price" value="{{ $orderData['price'] }}">
				  </li>
				</ul>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-md-12">
				<p><strong class="text-warning">WARNING!</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius doloremque laborum sapiente libero autem necessitatibus blanditiis quisquam doloribus dolor molestias corporis a quam eum nisi, ea voluptate, praesentium iste saepe.</p>
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