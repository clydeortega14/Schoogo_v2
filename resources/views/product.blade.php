@extends('layouts.landing')

@section('title', 'Product')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h2>{{ $product->name }}</h2>
			<hr>
		</div>

		<div class="col-sm-12 col-md-4">
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

		<div class="col-sm-12 col-md-8">
			<h3>Price Calculator</h3>
			<hr>

			<div class="form-group row">
				<label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Paper Size') }}</label>
				<div class="col-md-8">
					<select name="size" id="size" class="form-control">
						@foreach($product->sizes as $size)
							<option value="{{ $size->id }}">{{ $size->size}}</option>
						@endforeach
					</select>
				</div>				
			</div>

			<div class="form-group row">
				<label for="paper" class="col-md-4 col-form-label text-md-right">{{ __('Choose Paper') }}</label>
				<div class="col-md-8">
					<select name="paper" id="paper" class="form-control">
						@foreach($product->paper_types as $paper)
							<option value="{{ $paper->id}}">{{ $paper->name }} - {{ $paper->gsm}} </option>
						@endforeach
					</select>
				</div>				
			</div>

			{{-- <div class="form-group row">
				<label for="front_side" class="col-md-4 col-form-label text-md-right">{{ __('Front Side') }}</label>
				<div class="col-md-8">
					<select name="front_side" class="form-control">
						<option> -- Select Print Option -- </option>
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
			</div> --}}

			<div class="form-group row">
				<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
				<div class="col-md-8">
					<select name="quantity" id="quantity" class="form-control">
						@foreach($quantities as $quantity)
							<option value="{{ $quantity->id }}">{{ $quantity->quantity}}</option>
						@endforeach
					</select>
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
						<h3>PHP 
							<span class="prod_price"></span>
							<input type="hidden" class="prod_price">
						</h3>
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

@section('custom_js')

<script type="text/javascript">
	
	
	$(function(){

		var size = $('#size option:selected').val();
		var qty  = $('#quantity option:selected').val();

		getPrice();

		function getPrice()
		{
			let url  = `/pricing/${size}/${qty}`;

			getAjax(url);
		}
		
		function getAjax(url)
		{
			return $.ajax({

				method : 'GET',
				url : url,
				success : function(res){

					$('.prod_price').html(res);
					$('.prod_price').val(res);
				},
				error : function(error){
					console.log(error)
				}
 			})
		}


		$('#size').change((e) => {

			e.preventDefault();

			let new_size = $(this).find('option:selected').val();
			let url = `/pricing/${new_size}/${qty}`;

			getAjax(url);
		});

		$('select[name="quantity"]').change((e) => {

			e.preventDefault();

			let new_qty = $(this).find('option:selected').val();

			console.log(new_qty)
			let url = `/pricing/${size}/${new_qty}`;
			getAjax(url);
		})
	});
</script>


@endsection