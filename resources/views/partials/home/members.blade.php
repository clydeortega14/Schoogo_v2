@if(auth()->user()->role_id == 1)
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Latest Members</h3>
				<div class="box-tools pull-right">
                    <span class="label label-danger">
                    	@if(count($members) > 0)
                    		{{ count($members) }} New Members
                    	@endif
                    </span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
			</div>

			<div class="box-body no-padding">
				<ul class="users-list clearfix">
					@if(count($members) > 0)
					@foreach($members as $member)
    					<li>
	                    	<img src="/dist/img/user1-128x128.jpg" alt="User Image">
	                    	<a class="users-list-name" href="#">{{ $member->firstname}} {{ $member->lastname }}</a>
	                    	<span class="users-list-date">{{ $member->created_at->diffForHumans() }}</span>
	                    </li>
                    @endforeach
                    @else
                    	<h3 class="box-title text-right">No Member</h3>
                    @endif
				</ul>
			</div>
			
			@if(count($members) > 0)
    			<div class="box-footer text-center">
                	<a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
            @endif
		</div>
	</div>
@endif