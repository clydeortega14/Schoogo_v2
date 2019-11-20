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
		<div class="col-md-7">
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="row">
						<div class="col-sm-6">Customer Details</div>
						<div class="col-sm-6 pull-right">
							<form action="{{ route('orders.update', $order->id) }}" method="POST">
								@method('PUT')
								@csrf
								<div class="input-group">
					                <!-- /btn-group -->
					                <select name="status" class="form-control">
					                	@foreach($statuses as $status)
					                		<option value="{{ $status->id }}" {{ $status->id == $order->order_status_id ? 'selected' :
					                	 ''}}>{{ $status->status }}</option>
					                	@endforeach
					                </select>
					                <div class="input-group-btn">
					                  <button type="submit" class="btn btn-success">Submit</button>
					                </div>
					              </div>
							</form>
						</div>
					</div>
					
					
				</div>
				<div class="box-body">
					<form class="form-horizontal">
					<div class="form-group">
	                  <label class="col-sm-2 control-label">Firstname</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->firstname }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">Lastname</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->lastname }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">Email</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->email }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">Contact</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->contact }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">Country</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->country }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">State</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->state }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">City</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->city }}" class="form-control" readonly>
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label class="col-sm-2 control-label">Address</label>

	                  <div class="col-sm-8">
	                    <input type="text" value="{{ $order->deliverTo->street }}" class="form-control" readonly>
	                  </div>
	                </div>
	                </form>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            {{-- <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Nadia Carmichael</h3>
              <h5 class="widget-user-desc">Lead Developer</h5>
            </div> --}}
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li class="text-center"><h3>Order Summary</h3></li>
                <li><a href="#">Product <span class="pull-right">{{ $order->pricing->product->name }}</span></a></li>
                <li><a href="#">Category <span class="pull-right">{{ $order->pricing->categories->name }}</span></a></li>
                <li><a href="#">Size <span class="pull-right">{{ $order->pricing->sizes->size}}</span></a></li>
                <li><a href="#">Quantity <span class="pull-right">{{ $order->pricing->quantity }}</span></a></li>
                <li>
                	<span class="text-center"><h3>Total Price : PHP {{ $order->pricing->pricingFormattedPrice() }}</h3>
                	</span>
                </li>
              </ul>
            </div>
          </div>
		</div>
	</div>
</section>

@endsection