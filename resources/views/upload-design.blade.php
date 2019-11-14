@extends('layouts.landing')

@section('title', 'Upload Design')

@section('content')

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h5>Uploading Design ({{ $product->name}}) </h5>
			<hr>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Product Name</a></li>
					<li class="breadcrumb-item active" aria-current="page">Upload Design</li>
				</ol>
			</nav>
		</div>
	</div>
	<form action="{{ url('/checkout/'.$product->id) }}" method="POST" enctype="multipart/form-data">

	@csrf
	<div class="row justify-content-center">

		<div class="col-xs-12 col-md-8">
			<div class="form-group row">
				<label for="size" class="col-md-4 col-form-label text-md-right">Size</label>
				<div class="col-md-8">
					<select name="size" id="size" class="form-control">
						@foreach($product->sizes as $size)
							<option value="{{ $size->id}}" {{ $size->id == $order_data['size'] ? 'selected' : '' }}>{{ $size->size}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<div class="form-group row">
						<label for="" class="col-md-4 col-form-label text-md-right">Name</label>
						<div class="col-sm-8">
							<input type="text" name="artwork_name" value="{{ $order_data['artwork_name'] }}" class="form-control">
						</div>
					</div>
				</div>

				<div class="card-body">
					<input type="file" name="file">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="float-right">
						<button type="submit" class="btn btn-info btn-block">Checkout</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	<hr>
</div>

@endsection
