@extends('layouts.landing')

@section('title', 'Product')

@section('content')

<div class="container">
	<form action="{{ route('upload.design') }}" method="GET">

		@csrf
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h1>{{ $product->name }}</h1>
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
						<img src="{{ $category->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('storage/images/categories/'.$category->image)  }}" alt="..." class="mx-auto d-block img-fluid">
					</a>
					<div class="card-body">
						
						<h6 class="card-title">{{ $category->name }}</h6>
					</div>
				</div>
				
				<br>
			</div>

			<div class="col-sm-12 col-md-6">
				<h5>Price Calculator</h5>
				<hr>

				<div class="form-group row">
					<label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>
					<div class="col-md-8">
						<select name="size" id="size" class="@error('size') is-invalid @enderror form-control">
							@foreach($sizes as $size)
								<option value="{{ $size->id}}">{{ $size->size }}</option>
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
						<select class="form-control" name="quantity" id="quantity">
							{{-- <option value="">Select</option> --}}
						{{-- @foreach($product->pricings->unique('quantity') as $pricing)
							<option value="{{ $pricing->quantity}}"> {{ $pricing->quantity}}</option>
						@endforeach --}}
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
				<hr>
				<div class="row jutify-content-end">
					<div class="col-sm-4"></div>
					<div class="col-sm-8">
						<button type="submit" class="btn btn-info btn-block">
						{{-- <i class="fa fa-money-bill-alt"></i> --}}
						<span>Upload Design</span>
					</button>
						{{-- <a href="{{ route('upload.design') }}" class="btn btn-info btn-block">Continue Uploading Design</a> --}}
					</div>
				</div>
			</div>
		</div>
		{{-- <hr> --}}
		<div class="row">
			<div class="col-xs-12 col-md-6">
				
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="float-right">
					
					
				</div>
			</div>
		</div>
	</form>
</div>

@endsection

{{-- @include('partials.scripts.information') --}}
@section('custom_js')
<script type="text/javascript">
	$(function(){

		var size = $('#size option:selected').val();
		var quantity = $('#quantity');
		var url = `/api/get-quantities/${size}`;

		$.ajax({

			method : 'GET',
			url : url,
			success : function(res){
				// console.log(res)
				quantity.empty()
				res.forEach((index, value) =>{
					quantity.append(`<option value="${index.quantity}">${index.quantity}</option>`)
				})
			},
			error : function(error){
				console.log(error)
			}
		})
	});
</script>
@endsection