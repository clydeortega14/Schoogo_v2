@extends('layouts.master')

@section('title', 'View Order')

@section('content')
<section class="content-header">
  <h1>
    Orders
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Orders</li>
  </ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Orders Lists</h3>
                    {{-- <a href="{{ route('products.create') }}" class="btn btn-primary btn-flat pull-right">Add Product</a> --}}
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover" id="example2">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Product - Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($orders as $order)
			                  <tr>
			                    <td>
			                    	<a href="{{ route('orders.show', $order->id) }}">{{ $order->or_number}}</a>
			                    </td>
			                    <td>{{ $order->product->name }} - {{ $order->pricing->categories->name}}</td>
			                    <td><span class="{{ $order->status->class }}">{{ $order->status->status }}</span></td>
			                    <td>
			                      <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-xs btn-flat">
			                      	<i class="fa fa-edit"></i>
			                      </a>
			                      <a href="#" class="btn btn-success btn-xs btn-flat">
			                      	<i class="fa fa-check"></i>
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