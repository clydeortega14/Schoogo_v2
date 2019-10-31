<div class="row justify-content-center">
	<div class="col-md-4 col-sm-6 col-xs-12">
    	<div class="info-box">
        	<span class="info-box-icon bg-green"><i class="fa fa-area-chart"></i></span>

        	<div class="info-box-content">
        		<span class="info-box-text">All Request</span>
        		<span class="info-box-number">{{ count($tickets) > 0 ? : 0 }}</span>
        	</div>
        
    	</div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
    	<div class="info-box">
        	<span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>

        	<div class="info-box-content">
        		<span class="info-box-text">Delivered Documents</span>
        		<span class="info-box-number">{{ count($tickets->where('docs_status_id', 4)) > 0 ? : 0}}</span>
        	</div>
        
    	</div>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
    	<div class="info-box">
        	<span class="info-box-icon bg-red"><i class="fa fa-info"></i></span>

        	<div class="info-box-content">
        		<span class="info-box-text">Current Request Status</span>
        		<span class="{{ $current_request == null ? 'label label-default' : $current_request->docsStatuses->class}}">{{ $current_request == null ? 'no request created' : $current_request->docsStatuses->name }} </span>
        	</div>
        
    	</div>
    </div>
</div>