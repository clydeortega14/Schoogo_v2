@extends('layouts.master')

@section('title', 'Products')

@section('content')

<section class="content-header">
    <h1>Products</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-dashboard"></i> Products</a></li>
        <li class="active">Edit {{ $product->name }}</li>
    </ol>
</section>


<section class="content">
	
    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
            	<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        		@csrf
	                <div class="box box-primary">
	                    <div class="box-body">
	                    	<img src="{{ asset('storage/images/products/'.$product->image) }}" alt="..." height="150" width="150" class="img-fluid mx-auto d-block">
	                        <div class="form-group">
	                            <label for="">Name</label>
	                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
	                        </div>

	                        <div class="form-group">
	                            <label for="">Description</label>
	                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
	                        </div>

	                        <div class="form-group">
	                            <label for="">Upload Image Here</label>
	                            <input type="file" name="image">
	                        </div>
	                    </div>


	                    <div class="box-footer">
	                        <button type="submit" class="btn btn-primary btn-flat">Save Changes</button>
	                        <a href="{{ route('products.index') }}" class="btn btn-danger btn-flat">Cancel</a>
	                    </div>
	                </div>
                </form>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-8">
            	<div class="box box-primary">
            		<div class="box-header">
            			{{ $product->name }} Sizes

            		</div>

            		<div class="box-body">

            			<form action="#" method="POST">

            				@csrf
	            			<div class="input-group">
								<input type="text" name="size" class="form-control">
								<span class="input-group-btn">
							    	<button class="btn btn-primary btn-float" type="button">Add</button>
								</span>
							</div>
						</form>

            			<table class="table table-striped">
            				<thead>
            					<th>Sizes</th>
            					<th></th>
            				</thead>
            				<tbody>
            					@foreach($product->sizes as $size)
									<tr>
										<td>{{ $size->size}}</td>
										<td>
											<a href="#" class="btn btn-warning btn-sm btn-flat">Add Pricing</a>
										</td>
									</tr>
            					@endforeach
            				</tbody>
            			</table>
            		</div>
            	</div>
            </div>
        </div>

</section>

@endsection