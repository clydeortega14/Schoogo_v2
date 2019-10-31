<div class="row">
    	
    	<div class="{{ auth()->user()->role_id == 1 ? 'col-md-6' : 'col-md-12' }} col-sm-12 col-xs-12">
    		<div class="box box-primary">
    			<div class="box-header with-border">
    				@if(auth()->user()->role_id == 1)
	            	<h3 class="box-title">Recent Requests</h3>
	            	@else
	            		@if(count($tickets) > 0)
							<a href="{{ route('request-files.create') }}" class="btn btn-flat btn-primary">
								<i class="fa fa-plus"></i>
								<span>Create new request</span>
							</a>
						@endif
	            	@endif
	           	</div>


	    		<div class="box-body">
	    			<ul class="products-list product-list-in-box">
	    				@if(count($tickets) > 0)
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
					                    created <small> {{ $ticket->created_at->diffForHumans() }} </small>
					                    <span class="product-description">{{ $ticket->doc_summary}}</span>
				                	</div>
				                </li>
			                @endforeach
		                @else
		                	<li class="item">
		                	<h3 class="box-title text-center">No request</h3>
		                	@if(auth()->user()->role_id == 2)
		                		<div class="text-center"> 
								    <a href="{{ route('request-files.create') }}" class="btn btn-default btn-flat">
								    	<i class="fa fa-plus"></i>
								    	<span>Create new request</span>
								    </a> 
								</div>
		                	@endif
		                	</li>
		                @endif
	    			</ul>
	    		</div>
				
				@if(count($tickets) > 0)
		    		<div class="box-footer text-center">
	              		<a href="javascript:void(0)" class="uppercase">View All Request</a>
	            	</div>
            	@endif
    		</div>
    	</div>
		
		@include('partials.home.members')
    </div>