@extends('layouts.landing')

@section('title', 'Upload Design')

@section('content')

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1>Uploading Design </h1>
			<hr>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Price Calculation</a></li>
					<li class="breadcrumb-item active" aria-current="page">Upload your artwork</li>
				</ol>
			</nav>
		</div>
	</div>
	<form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">

	@csrf
	<div class="row justify-content-center">

		<div class="col-xs-12 col-md-8">
			<div class="form-group row">
				<label for="size" class="col-md-4 col-form-label text-md-right">Size</label>
				<div class="col-md-8">
					<select name="size" id="size" class="form-control">
						@foreach($sizes as $size)
							<option value="{{ $size->id }}" {{ $size->id == $sessionData['size'] ? 'selected' : '' }}>{{ $size->size}}</option>
						@endforeach()	
					</select>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Upload Your artwork here</h5>
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
