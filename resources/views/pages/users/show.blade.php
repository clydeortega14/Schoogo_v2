@extends('layouts.landing')

@section('title', 'View Product')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Order Details</h1>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h6>Delivery Address</h6>
					<hr>

					<div class="form-group">	
						<textarea name="complete_address" id="complete-address" class="form-control" placeholder="Enter Complete Address" required>{{ $order->deliverTo->complete_address }}</textarea>
					</div>

					<div class="form-group">	
						<input type="text" name="contact_person" value="{{ $order->deliverTo->contact_person }}" class="form-control" placeholder="Enter Contact Person" required>
					</div>

					<div class="form-group">	
						<input type="text" name="contact_number" value="{{ $order->deliverTo->contact_number }}" class="form-control" placeholder="Enter Contact Number" required>
					</div>
				</div>
			</div>
			

			

		</div>

		<div class="col-md-6">
		<ul class="list-group">
			<li class="list-group-item active">Order Summary</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">
				Artwork
				<span>
					<img src="{{ asset('/uploads/files/documents/'.$order->file) }}" alt="..." class="img-fluid mx-auto d-block" height="250" width="100">
				</span>
			</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">
				Product
				<span>{{ $order->product->name }}</span>
			</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">
				Size
				<span>{{ $order->pricing->sizes->size}}</span>
			</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">
				Quantity
				<span>{{ $order->pricing->quantity}}</span>
			</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<h4>Total Price</h4>
				<span>
					<h4>PHP {{ $order->presentPrice() }}</h4>
				</span>
			</li>
		</ul>
		</div>
	</div>
</div>

@endsection