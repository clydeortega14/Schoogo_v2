@extends('layouts.landing')

@section('title', 'Product')

@section('content')

<div class="container">
	<form action="{{ url('/checkout/'.$product->id) }}" method="POST" enctype="multipart/form-data">

		@csrf
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h5>{{ $product->name }}</h5>
				<input type="hidden" name="product_id" value="{{ $product->id }}">
				<hr>
			</div>

			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-body">
						<a href="#">
							<img src="/img/portfolio/thumbnails/1.jpg" alt="..." class="mx-auto d-block img-fluid">
						</a>
					</div>
				</div>
				<br>
			</div>

			<div class="col-sm-12 col-md-6">
				<h5>Calculate Price</h5>
				<hr>

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
					</ol>
				</nav>

				
				<div class="form-group row">
					<label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Paper Size') }}</label>
					<div class="col-md-8">
						<select name="size" id="size" class="@error('size') is-invalid @enderror form-control">
							@foreach($product->sizes as $size)
								<option value="{{ $size->id}}">{{ $size->size}}</option>
							@endforeach
						</select>

						@error('size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>				
				</div>

				<div class="form-group row">
					<label for="paper" class="col-md-4 col-form-label text-md-right">{{ __('Choose Paper') }}</label>
					<div class="col-md-8">
						<select name="paper" id="paper" class="form-control">
							@foreach($product->paper_types as $paper)
								<option value="{{ $paper->id }}">{{ $paper->name }} - {{ $paper->gsm}} </option>
							@endforeach
						</select>
					</div>				
				</div>


				<div class="form-group row">
					<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
					<div class="col-md-8">
						<select name="quantity" id="quantity" class="form-control">
							@foreach($quantities as $quantity)
								<option value="{{ $quantity->id}}">{{ $quantity->quantity}}</option>
							@endforeach
						</select>
					</div>				
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="float-right">
							<h5>Estimated Total :
								PHP <span class="prod_price"></span>
								<input type="hidden" name="price" class="prod_price">
							</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="float-right">
					<button type="submit" class="btn btn-info btn-block">
						<i class="fa fa-money-bill-alt"></i>
						<span>Checkout</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

@include('partials.scripts.information')