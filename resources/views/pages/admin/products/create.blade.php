@extends('layouts.master')

@section('title', 'Products')

@section('content')

<section class="content-header">
    <h1>Add Product</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-dashboard"></i> Products</a></li>
        <li class="active">Add new product</li>
    </ol>
</section>

<section class="content">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    	<div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name here" required>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter Description here"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Upload Image Here</label>
                            <input type="file" name="image">
                        </div>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Add Product</button>
                        <a href="{{ route('products.create') }}" class="btn btn-danger btn-flat">Cancel</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </form>
</section>

@endsection
