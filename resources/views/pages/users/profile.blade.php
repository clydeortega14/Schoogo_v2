@extends('layouts.landing')

@section('title', 'Profile')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Orders Monitoring</h1>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-dark table-striped table-bordered">
					<thead>
						<tr>
							<th>Order #</th>
							<th>Product</th>
							<th>User</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach($orders as $order)
							<tr>
								<td>{{ $order->or_number}}</td>
								<td>
									{{ $order->product->name}} - 
									{{ $order->pricing->sizes->size}} - 
									{{ $order->pricing->quantity}}
								</td>
								<td>{{ $order->user->firstname}} {{ $order->user->lastname }}</td>
								<td>
									<span class="{{ $order->status->class}}">{{ $order->status->status }}</span>
								</td>
								<td>
									<a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">
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

@endsection