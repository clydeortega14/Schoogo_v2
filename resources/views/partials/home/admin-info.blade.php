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
        	<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

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
        	<span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>

        	<div class="info-box-content">
        		<span class="info-box-text">Delivered Documents</span>
        		<span class="info-box-number">{{ count($tickets->where('docs_status_id', 4)) }}</span>
        	</div>
        
    	</div>
    </div>
</div>
