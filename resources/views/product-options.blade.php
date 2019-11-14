@extends('layouts.landing')

@section('title', 'Product Options')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h5>Review Order ( {{ $product->name }} )</h5>
		</div>
	</div>
	<hr>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ url('/display-product/'.$product->id) }}">Order Inquiry</a></li>
			<li class="breadcrumb-item active" aria-current="page">Product Information</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="card">
				<div class="card-header">
					Upload Your Design
				</div>

				<div class="card-body">
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<h5>Product Information</h5>
			<hr>
			
			<div class="form-group row">
				<label for="size" class="col-md-4 col-form-label text-md-right">Artwork Name</label>
				<div class="col-md-8">
					<label>{{ isset($data) ? $data['artwork_name'] : 'no artwork'}}</label>
				</div>
			</div>
			<div class="form-group row">
				<label for="size" class="col-md-4 col-form-label text-md-right">Size</label>
				<div class="col-md-8">
					<select name="size" id="size" class="form-control">
						@foreach($product->sizes as $size)
							<option value="{{ $size->id}}" {{ isset($data) && $size->id == $data['size'] ? 'selected' : '' }}>{{ $size->size}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="paper" class="col-md-4 col-form-label text-md-right">{{ __('Choose Paper') }}</label>
				<div class="col-md-8">
					<select name="paper" id="paper" class="form-control">
						@foreach($product->paper_types as $paper)
							<option value="{{ $paper->id}}" {{ isset($data) && $paper->id == $data['paper'] ? 'selected' : '' }}>{{ $paper->name }} - {{ $paper->gsm}} </option>
						@endforeach
					</select>
				</div>				
			</div>

			<div class="form-group row">
				<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
				<div class="col-md-8">
					<select name="quantity" id="quantity" class="form-control">
						@foreach($quantities as $quantity)
							<option value="{{ $quantity->id }}" {{ isset($data) && $quantity->id == $data['quantity'] ? 'selected' : ''}}>{{ $quantity->quantity}}</option>
						@endforeach
					</select>
				</div>				
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="float-right">
						<h5>Subtotal :
							PHP <span class="prod_price"></span>
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
			<p> <strong>WARNING ! </strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, numquam maiores quis! Iusto tenetur, expedita explicabo dolorem fugit ad, inventore voluptas at architecto minus corporis dignissimos nisi tempore doloribus laudantium.</p>
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
				<button class="btn btn-info btn-block">Save Order</button>
			</div>
		</div>
	</div>
</div>

@endsection

@include('partials.scripts.information')