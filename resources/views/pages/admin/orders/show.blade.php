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
		                  <label class="col-sm-2 control-label">Complete Address</label>

		                  <div class="col-sm-8">
		                  	<textarea type="text" name="complete_address" id="complete-address" class="form-control" readonly>{{ $order->deliverTo->complete_address }}</textarea>
		                  </div>
		                </div>

		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Contact Person</label>

		                  <div class="col-sm-8">
		                    <input type="text" value="{{ $order->deliverTo->contact_person }}" class="form-control" readonly>
		                  </div>
		                </div>

		                <div class="form-group">
		                  <label class="col-sm-2 control-label">Contact Number</label>

		                  <div class="col-sm-8">
		                    <input type="text" value="{{ $order->deliverTo->contact_number }}" class="form-control" readonly>
		                  </div>
		                </div>

	                </form>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="box box-widget widget-user-2">

            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li class="text-center"><h3>Order Summary</h3></li>
                <li>
                	<a href="#">Artwork 
	                	<span class="pull-right">
	                		<img src="{{ asset('/uploads/files/documents/'. $order->file)  }}" alt="..." class="img-fluid mx-auto d-block">
	                	</span>
                	</a>
                </li>
                <li><a href="#">Product <span class="pull-right">{{ $order->product->name }}</span></a></li>
                <li><a href="#">Size <span class="pull-right">{{ $order->pricing->sizes->size}}</span></a></li>
                <li><a href="#">Quantity <span class="pull-right">{{ $order->pricing->quantity }}</span></a></li>
                <li>
                	<a href="#"><h3>Total Price 
                		<span class="pull-right"> 
                			PHP {{ $order->pricing->pricingFormattedPrice() }} </h3>
                		</span>
                	</a>
                </li>
              </ul>
            </div>
          </div>
		</div>
	</div>
</section>

@endsection