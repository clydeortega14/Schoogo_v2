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
    <form action="">
    	<div class="row justify-content-center">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name here">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter Description here"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Upload Image Here</label>
                            <input type="file" name="product_image">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Sizes</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-flat btn-sm pull-right">Add more</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-4">
                                <input type="text" name="sizes[]" class="form-control" placeholder="Enter Size">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="sizes[]" class="form-control" placeholder="Enter Size">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="sizes[]" class="form-control" placeholder="Enter Size">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Paper Name and Gsm (paper weight)</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-default btn-flat btn-sm pull-right">Add more</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" name="paper_name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="col-xs-6">
                                <input type="text" name="paper_weight" class="form-control" placeholder="Enter weight">
                            </div>
                            <br>
                            <br>
                            <div class="col-xs-6">
                                <input type="text" name="paper_name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="col-xs-6">
                                <input type="text" name="paper_weight" class="form-control" placeholder="Enter weight">
                            </div>
                            <br>
                            <br>
                            <div class="col-xs-6">
                                <input type="text" name="paper_name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="col-xs-6">
                                <input type="text" name="paper_weight" class="form-control" placeholder="Enter weight">
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                        <button class="btn btn-primary btn-flat">Add Product</button>
                        <a href="{{ route('products.create') }}" class="btn btn-danger btn-flat">Cancel</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </form>
</section>

@endsection
