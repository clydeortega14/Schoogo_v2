@extends('layouts.landing')

@section('title', 'Product')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h2>{{ $product->name }}</h2>
			<hr>
		</div>

		<div class="col-sm-4">
			<div class="card">
				<div class="card-body">
					<a href="{{ route('view.product', $product->id) }}">
						<img src="/img/portfolio/thumbnails/1.jpg" alt="..." class="img-fluid mx-auto d-block" height="300" width="300">
					</a>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-header">Upload your design here</div>
				<div class="card-body">
					<div class="form-group">
						<input type="file" name="file">
					</div>
					
					<a href="{{ route('view.product', $product->id) }}">
						<img src="/img/portfolio/thumbnails/5.jpg" alt="..." class="img-fluid mx-auto d-block" height="300" width="300">
					</a>
				</div>

				<div class="card-footer">
					<button class="form-control btn btn-info">Upload</button>
				</div>
			</div>
		</div>

		<div class="col-sm-xs-12 col-md-8">
			<h3>Price Calculator</h3>
			<hr>

			<div class="form-group row">
				<label for="paper" class="col-md-4 col-form-label text-md-right">{{ __('Paper Size') }}</label>
				<div class="col-md-8">
					<select name="paper" class="form-control">
						<option> -- Select Size --</option>
						<option value="">CSF - 370 gsm</option>
						<option value="">Cloth Banner - 250 gsm</option>
					</select>
				</div>				
			</div>

			<div class="form-group row">
				<label for="paper" class="col-md-4 col-form-label text-md-right">{{ __('Choose Paper') }}</label>
				<div class="col-md-8">
					<select name="paper" class="form-control">
						<option> -- Select Paper --</option>
						<option value="">CSF - 370 gsm</option>
						<option value="">Cloth Banner - 250 gsm</option>
					</select>
				</div>				
			</div>

			<div class="form-group row">
				<label for="front_side" class="col-md-4 col-form-label text-md-right">{{ __('Front Side') }}</label>
				<div class="col-md-8">
					<select name="front_side" class="form-control">
						<option> -- Select Print Option --</option>
						<option value="">Colored</option>
						<option value="">Black & White</option>
						<option value="">Blank</option>
					</select>
				</div>				
			</div>

			<div class="form-group row">
				<label for="back_side" class="col-md-4 col-form-label text-md-right">{{ __('Back Side') }}</label>
				<div class="col-md-8">
					<select name="back_side" class="form-control">
						<option> -- Select Print Option --</option>
						<option value="">Colored</option>
						<option value="">Black & White</option>
						<option value="">Blank</option>
					</select>
				</div>				
			</div>

			<div class="form-group row">
				<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
				<div class="col-md-8">
					<input type="number" min="1" value="1" class="form-control">
				</div>				
			</div>
			<div class="form-group row">
				<label for="finishing" class="col-md-4 col-form-label text-md-right">{{ __('Finishing') }}</label>
				<div class="col-md-8">
					<select name="finishing" class="form-control">
						<option value="">N/A</option>
						<option value="">Mass</option>
						<option value="">Clot</option>
						<option value="">Telt</option>
					</select>
				</div>				
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="float-right">
						<h5>Estimated Total</h5>
						<h3>PHP 450.00</h3>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="float-right">
						<button type="button" class="btn btn-info">Checkout now</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection