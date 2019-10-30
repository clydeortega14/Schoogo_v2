@extends('layouts.master')

@section('title', 'Home')

@section('content')


<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content container-fluid">
    
    <div class="row">
	    <div class="col-md-3 col-sm-6 col-xs-12">
	    	<div class="info-box">
	        	<span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>

	        	<div class="info-box-content">
	        		<span class="info-box-text">Sales</span>
	        		<span class="info-box-number">90<small>%</small></span>
	        	</div>
	        
	    	</div>
	    </div>

	    <div class="col-md-3 col-sm-6 col-xs-12">
	    	<div class="info-box">
	        	<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

	        	<div class="info-box-content">
	        		<span class="info-box-text">New members</span>
	        		<span class="info-box-number">{{ count($members) }}</span>
	        	</div>
	        
	    	</div>
	    </div>

	    <div class="col-md-3 col-sm-6 col-xs-12">
	    	<div class="info-box">
	        	<span class="info-box-icon bg-blue"><i class="fa fa-area-chart"></i></span>

	        	<div class="info-box-content">
	        		<span class="info-box-text">New Request</span>
	        		<span class="info-box-number">{{ count($tickets->where('docs_status_id', 1)) }}</span>
	        	</div>
	        
	    	</div>
	    </div>

	    <div class="col-md-3 col-sm-6 col-xs-12">
	    	<div class="info-box">
	        	<span class="info-box-icon bg-aqua"><i class="fa fa-cab"></i></span>

	        	<div class="info-box-content">
	        		<span class="info-box-text">Delivered Documents</span>
	        		<span class="info-box-number">{{ count($tickets->where('docs_status_id', 4)) }}</span>
	        	</div>
	        
	    	</div>
	    </div>
    </div>

    <div class="row">
    	
    	<div class="col-md-6 col-sm-12 col-xs-12">
    		<div class="box box-primary">
    			<div class="box-header with-border">
	            	<h3 class="box-title">Recent Requests</h3>
           			<div class="box-tools pull-right">
                		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
           			</div>
	           	</div>


	    		<div class="box-body">
	    			<ul class="products-list product-list-in-box">
	    				@foreach($tickets as $ticket)
			    			<li class="item">
			                	<div class="product-img" data-toggle="tooltip" data-placement="top" title="{{ $ticket->user->email }}">
			                    	<img src="/dist/img/user1-128x128.jpg" class="img-fluid mx-auto d-block" width="70" height="70" alt="Product Image">
			                  	</div>
			                  	<div class="product-info">
				                    <a href="{{ route('request-files.edit', $ticket->id) }}" class="product-title">
				                    	{{ $ticket->doc_title }}
				                    	<span class="{{ $ticket->docsStatuses->class }} pull-right">{{ $ticket->docsStatuses->name }}</span>
				                    </a>
				                    created on <small> {{ $ticket->created_at->diffForHumans() }} </small>
				                    <span class="product-description">{{ $ticket->doc_summary}}</span>
			                	</div>
			                </li>
		                @endforeach
	    			</ul>
	    		</div>

	    		<div class="box-footer text-center">
              		<a href="javascript:void(0)" class="uppercase">View All Request</a>
            	</div>
    		</div>
    	</div>

    	<div class="col-md-6 col-sm-12 col-xs-12">
    		<div class="box box-danger">
    			<div class="box-header with-border">
    				<h3 class="box-title">Latest Members</h3>
    				<div class="box-tools pull-right">
	                    <span class="label label-danger">{{ count($members) }} New Members</span>
	                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	                </div>
    			</div>

    			<div class="box-body no-padding">
    				<ul class="users-list clearfix">
    					@foreach($members as $member)
	    					<li>
		                    	<img src="/dist/img/user1-128x128.jpg" alt="User Image">
		                    	<a class="users-list-name" href="#">{{ $member->firstname}} {{ $member->lastname }}</a>
		                    	<span class="users-list-date">{{ $member->created_at->diffForHumans() }}</span>
		                    </li>
	                    @endforeach
    				</ul>
    			</div>

    			<div class="box-footer text-center">
                	<a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
    		</div>
    	</div>

    </div>

</section>

@endsection
