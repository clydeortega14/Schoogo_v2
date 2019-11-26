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

			<div class="col-xs-12 col-md-8">
				<div class="card">
					<div class="card-body">
						<h5>Delivery Address</h5>
						<hr>
						<div class="form-group">	
							<textarea name="complete_address" id="complete-address" class="form-control" placeholder="Enter Complete Address" required></textarea>
						</div>

						<div class="form-group">	
							<input type="text" name="contact_person" class="form-control" placeholder="Enter Contact Person" required>
						</div>

						<div class="form-group">	
							<input type="text" name="contact_number" class="form-control" placeholder="Enter Contact Number" required>
						</div>
					</div>

					<div class="card-footer">
						<div class="float-right">
							<button type="submit" class="btn btn-info">Order Now</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-4">
				
				<ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center active">
				   	Order Summary
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Artwork
				    <span>
				    	<img src="{{ asset('/uploads/files/documents/'.$session[0]) }}" alt="" class="img-fluid mx-auto d-block" height="100" width="100">
				    </span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Product
				    <span>{{ $product->name }}</span>
				    <input type="hidden" name="product_id" value="{{ $product->id}}">
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Category
				    <span>{{ $category->name }}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Size
				    <span>{{ $pricing->sizes->size }}</span>
				    <input type="hidden" name="size">
				  </li>

				  <li class="list-group-item d-flex justify-content-between align-items-center">
				   Quantity
				    <span>{{ $pricing->quantity }}</span>
				    <input type="hidden" name="quantity" value="">
				  </li>

				  <li class="list-group-item d-flex justify-content-end align-items-center">
				   	<h5>Total Price : PHP {{ $pricing->pricingFormattedPrice() }}</h5>
				   	<input type="hidden" name="price" value="{{ $pricing->price }}">
				  </li>
				</ul>
			</div>
		</div>
	</form>
	<hr>
</div>

@endsection