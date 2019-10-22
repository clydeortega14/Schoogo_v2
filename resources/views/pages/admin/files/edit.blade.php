@extends('layouts.master')

@section('title', 'Home')

@section('content')


<section class="content-header">
    <h1>Process File</h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    	<li><a href="{{ route('files') }}"><i class="fa fa-file"></i> Files </a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content container-fluid">
    
    <div class="row">
    	<div class="col-xs-12 col-md-6">
    		<div class="box box-primary">
    			<div class="box-header">
    				<h3 class="box-title">
    					Document Information
    				</h3>
    			</div>

    			<div class="box-body">
    				
    				<form action="form-horizontal">
    					
    					<div class="form-group">
    						<label for="title" class="col-sm-3 control-label">Document Title</label>
    						<div class="col-md-9">
    							<input type="text" value="{{ $file->purpose }}" class="form-control">
    						</div>
    					</div>
						<br>
    					<div class="form-group">
    						<label for="summary" class="col-sm-3 control-label">Summary</label>
    						<div class="col-md-9">
    							<textarea name="" id="summary" class="form-control">{{ $file->summary }}</textarea>
    						</div>
    					</div>

    					<div class="form-group">
    						<label for="summary" class="col-sm-3 control-label">File</label>
    						<div class="col-md-9">
    							<a href="#">
    								<img src="/img/files/file1.jpg" alt="..." class="img-fluid mx-auto d-block" height="100" width="100">
    							</a>
    						</div>
    					</div>

    					<div class="form-group">
    						<label for="summary" class="col-sm-3 control-label">Paper Size</label>
    						<div class="col-md-9">
    							<p class="lead">{{ $file->size->size }} ( {{$file->size->presentPrice()}} / per page )</p>
    						</div>
    					</div>

    					<div class="form-group">
    						<label for="summary" class="col-sm-3 control-label">Print Type</label>
    						<div class="col-md-9">
    							<a href="#">
    								<img src="/img/files/file1.jpg" alt="..." class="img-fluid mx-auto d-block" height="100" width="100">
    							</a>
    						</div>
    					</div>
    				</form>

    			</div>
    		</div>
    	</div>
    </div>

</section>

@endsection
