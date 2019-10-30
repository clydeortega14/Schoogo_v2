@extends('layouts.master')

@section('title', 'Edit Ticket')

@section('content')


<section class="content-header">
    <h1>Process File</h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    	<li><a href="{{ route('request-files.index') }}"><i class="fa fa-file"></i> Files </a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content container-fluid">
    
    <div class="row">
    	<div class="col-xs-12 col-md-6">

    		<div class="box">
    			<div class="box-header">
    				<h3 class="box-title">
    					Request Info
    				</h3>
    			</div>

    			<div class="box-body">
    				{{-- <h3 class="box-title">Client Info</h3> --}}
					<div class="form-group">
	                    <label for="name">Name </label>
	                    <input type="text" name="name" value="{{ $file->user->firstname }} {{ $file->user->lastname }}" class="form-control">
	                </div>

	                <div class="form-group">
	                    <label for="address">Address </label>
	                    <input type="text" name="address" class="form-control" value="{{ $file->user->address}}">
	                </div>

	                <div class="form-group">
	                    <label for="contact_number">Contact Number </label>
	                    <input type="text" name="contact_number" class="form-control" value="{{ $file->user->contact }}">
	                </div>	

	                {{-- <h3 class="box-title">File Info</h3> --}}
					<div class="form-group">
	                    <label for="docs_name">Docs Name </label>
	                    <input type="text" name="docs_name" value="{{ $file->doc_title }}" class="form-control">
	                </div>

	                <div class="form-group">
	                    <label for="summary">Docs Summary </label>
	                    <input type="text" name="summary" value="{{ $file->doc_summary }}" class="form-control">
	                </div>

	                <div class="form-group">
	                    <label for="paper_size">Paper Size </label>
	                    @foreach($paper_sizes as $size)
		                    <div class="radio">
		                    	<label>
		                    		<input type="radio" name="size" value="{{ $size->id }}" {{ $size->id == $file->paper_size_id ? 'checked' : '' }}> {{ $size->size }} <small> ( {{ $size->presentPrice() }} / page ) </small>
		                    	</label>
		                    </div>
	                    @endforeach
	                </div>

	                <div class="form-group">
	                    <label for="paper_size">Paper Size </label>
	                    @foreach($print_types as $type)
		                    <div class="radio">
	                    		<label>
	                    			<input type="radio" name="type" value="{{ $type->id }}" {{ $type->id == $file->print_type_id ? 'checked' : '' }}> {{ $type->type }} <small> ( {{ $type->presentPrice() }} / page ) </small>
	                    		</label>
		                    </div>
	                    @endforeach
	                </div>
					

    			</div>
    		</div>
    	</div>

    	<div class="col-xs-12 col-md-6">
    		<div class="box box-primary">
    			<div class="box-header with-border">
    				<h3 class="box-title">Document Computation</h3>
    				<span class="{{ $file->docsStatuses->class }} pull-right">{{ $file->docsStatuses->name }}</span>
    			</div>

    			<div class="box-body">
    				<form action="{{ route('compute.request.price', $file->id) }}" method="POST">
    					@method('PUT')
    					@csrf
	    				<table class="table table-bordered">
	    					<thead>
	    						<th>Price Per Page</th>
	    						<th>Number Of Page</th>
	    						<th>Subtotal</th>
	    					</thead>
	    					<tbody>
	    						<tr>
	    							<td> &#8369; {{ $price_per_page }}</td>
	    							<td>
	    								<input type="number" name="num_of_page" min="1" value="{{ $file->number_of_page == null ? 1 : $file->number_of_page }}" class="col-xs-3">
	    								<div class="col-xs-3">
	    									<button class="btn btn-primary btn-flat btn-xs">
						    					<i class="fa fa-plus"></i>
						    					<span>Compute</span>
						    				</button>
	    								</div>
	    							</td>
	    							<td> &#8369; {{ $subtotal }}</td>
	    						</tr>
	    					</tbody>
	    				</table>
						<br>
	    				<div class="row">
	    					<div class="col-xs-12">
	    						<table class="table">
					            	<tr>
					                	<th style="width:50%">Subtotal:</th>
					                	<td>
					                		&#8369; {{ $subtotal }}
					                	</td>
					            	</tr>
					            	<tr>
					                	<th>Tax (9.3%)</th>
					                	<td> &#8369; 10.34</td>
					            	</tr>
					            	<tr>
					                	<th>Shipping:</th>
					                	<td> &#8369; 5.80</td>
					            	</tr>
					            	<tr>
					                	<th>Total:</th>
					                	<td> &#8369; {{ $total }}</td>
					            	</tr>
					            </table>
	    					</div>
	    				</div>
    				</form>
    			</div>

    			<div class="box-footer">
    				<form action="" method="POST">
    					<div class="pull-right">
    						<button type="submit" class="btn btn-primary btn-flat">
    							<i class="fa fa-thumbs-up"></i>
    							<span>Approve</span>
    						</button>
    						<button type="submit" class="btn btn-warning btn-flat">
    							<i class="fa fa-thumbs-down"></i>
    							<span>Disapprove</span>
    						</button>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>

</section>

@endsection

