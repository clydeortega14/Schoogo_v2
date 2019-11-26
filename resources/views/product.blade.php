@extends('layouts.landing')

@section('title', 'Product')

@section('content')

<div class="container">
	<form action="{{ route('upload.design') }}" method="GET">
		@csrf
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1>{{ $product->name }}</h1>
				<input type="hidden" name="category_id" id="category-id" value="{{ $category->id}}">
				<input type="hidden" id="prod-id" value="{{ $product->id }}">
				<input type="hidden" name="product_id" value="{{ $product->id }}">
				<hr>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
					</ol>
				</nav>
			</div>

			<div class="col-sm-12 col-md-6">
				<div class="card h-100">
					<a href="#">
						<img src="{{ $category->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('/uploads/images/categories/'.$category->image)  }}" alt="..." class="mx-auto d-block img-fluid">
					</a>
					<div class="card-body">
						<h6 class="card-title">{{ $category->name }}</h6>
					</div>
				</div>
				<br>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-body">
						<h5>Price Calculator</h5>
						<hr>
						
						<div class="form-group row">
							<label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>
							<div class="col-md-8">
								<select name="size" id="size" class="@error('size') is-invalid @enderror form-control">
									@foreach($pricings->unique('size') as $price)
										<option value="{{ $price->sizes->id}}">{{ $price->sizes->size }}</option>
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
							<label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
							<div class="col-md-8">
								<select class="form-control" name="quantity" id="quantity"></select>
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
					<div class="card-footer">
						<button type="submit" class="btn btn-info float-right"> Upload Design </button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

@section('custom_js')
<script type="text/javascript">

	$(function(){

		//size
		let product_id = $('#prod-id')
		let category_id = $('#category-id')
		let size_url = `/api/get-size/${product_id.val()}/${category_id.val()}`;
		$.get(size_url, function(data){
			sizeOptions(data)
			getQuantity()
		})

		//events
		$('#size').change((e) => {

			let url = `/api/get-quantity/${e.target.value}`
			$.get(url, function(data){
				quantityOptions(data)
				calculation(e.target.value, $('#quantity option:selected').val())
			})
		})

		$('#quantity').change((e) => {
			calculation($('#size').val(), e.target.value)
		})

	});

	function getQuantity()
	{
		let size = $('#size')
		let url = `/api/get-quantity/${size.val()}`
		$.get(url, function(data){
			quantityOptions(data);
			initialCalculation();
		})
	}

	function sizeOptions(data){

		$('#size').empty()
		data.forEach((index, value) => {
			$('#size').append(`<option value=${index.id}>${index.size}</option>`)
		});
	}

	function quantityOptions(data){

		$('#quantity').empty()
		data.forEach((index, value) => {
			$('#quantity').append(`<option value=${index.quantity}>${index.quantity}</option>`)
		});

	}
	function calculation(size, qty)
	{
		let url = `/api/get-price/${size}/${qty}`
		$.get(url, function(data){
			$('.prod_price').html(data)
			$('input[name="price"]').val(data)
		})
	}
	function initialCalculation()
	{
		let data = {
			size : $('#size').val(),
			quantity : $('#quantity option:selected').val()
		}
		calculation(data.size, data.quantity);
	}
</script>
@endsection
