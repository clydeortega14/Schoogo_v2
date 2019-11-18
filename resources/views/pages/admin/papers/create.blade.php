@extends('layouts.master')

@section('title', 'Add paper')

@section('content')

<section class="content-header">
    <h1>Papers</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('papers.index') }}"><i class="fa fa-dashboard"></i> Papers Lists</a></li>
        <li class="active">add paper</li>
    </ol>
</section>

<section class="content container-fluid">
	<div class="row">
		<div class="col-sm-8">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Add paper</h3>
				</div>
				<form action="{{ route('papers.store') }}" method="POST" class="form-horizontal">
					@csrf
					<div class="box-body">
						<div class="form-group">
                          <label for="product" class="col-sm-3 control-label">Products</label>

                          <div class="col-sm-8">
                            <select name="product_id" id="product" class="form-control" required>
                                <option value=""> Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ isset($pricing) && $product->id == $pricing->product_id ? 'selected' : '' }}>{{ $product->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Name of paper</label>

                          <div class="col-sm-8">
                            <input type="text" name="name" placeholder="Enter Name of paper" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="gsm" class="col-sm-3 control-label">Gsm</label>

                          <div class="col-sm-8">
                            <input type="text" name="gsm" placeholder="Enter Paper weight" class="form-control" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price" class="col-sm-3 control-label">Additional Price</label>

                          <div class="col-sm-8">
                            <input type="number" name="price" placeholder="Enter additional price" class="form-control" required>
                          </div>
                        </div>
					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary btn-flat">Submit</button>
						<a href="" class="btn btn-danger btn-flat">Cancel</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</section>

@endsection