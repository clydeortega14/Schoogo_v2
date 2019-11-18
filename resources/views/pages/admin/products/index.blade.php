@extends('layouts.master')

@section('title', 'Products')

@section('content')

<section class="content-header">
    <h1>Products</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
    </ol>
</section>

<section class="content container-fluid">
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    {{-- <h3 class="box-title">Print Requests</h3> --}}
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-flat pull-right">Add Product</a>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover" id="example2">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ $product->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('storage/images/products/'. $product->image) }}" alt="..." height="50" width="50">
                                    </td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->description}}</td>
                                    <td>
                                        <span class="{{ $product->status == true ? 'label label-success' : 'label label-danger'}}">
                                            {{ $product->status == true ? 'Active' : 'Inactive'}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-xs btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a>
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
