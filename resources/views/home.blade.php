@extends('layouts.master')

@section('title', 'Home')



@section('content')
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending </span>
              <span class="info-box-number">{{ count($orders->where('order_status_id', 1)) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">In process </span>
              <span class="info-box-number">{{ count($orders->where('order_status_id', 2)) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Shipping </span>
              <span class="info-box-number">{{ count($orders->where('order_status_id', 3)) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Delivered </span>
              <span class="info-box-number">{{ count($orders->where('order_status_id', 4)) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="example2">
	                  <thead>
		                  <tr>
		                    <th>Order #</th>
		                    <th>Product Category</th>
		                    <th>Status</th>
		                    <th>Action</th>
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
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-footer -->
          </div>
		</div>

		<div class="col-sm-4">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              	@foreach($products as $product)
	                <li class="item">
	                  <div class="product-img">
	                    <img src="{{ $product->image == null ? '/dist/img/default-50x50.gif' : asset('storage/images/products/'.$product->image) }} " alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">{{$product->name}}</a>
	                    <span class="product-description">
	                          {{ $product->description }}
	                        </span>
	                  </div>
	                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
		</div>
	</div>
</section>
	
</section>

@endsection
