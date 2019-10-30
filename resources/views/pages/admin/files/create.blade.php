@extends('layouts.master')

@section('title', 'Create New Ticket')

@section('content')

<section class="content-header">
    <h1>Create New Ticket</h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Creating new ticket</li>
    </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-2"></div>
		<div class="col-xs-8">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Create Here</h3>
				</div>
				<form action="{{ route('request-files.store') }}" method="POST" enctype="multipart/form-data">

					@csrf
				<div class="box-body" style="margin-left:20px;">

						<div class="form-group">
							<label for="files">File </label>
							<input type="file" name="file_to_upload">
						</div>

						<div class="form-group">
                            <label for="doc_title">Document Title </label>
                            <input type="text" name="doc_title" class="form-control" placeholder="Enter Document Title">
                        </div>

                        <div class="form-group">
                            <label for="doc_summary">Summary </label>
                            <textarea type="text" name="doc_summary" class="form-control" placeholder="Enter Document Summary"></textarea>
                        </div>

						<div class="form-group">
							<label for="paper_size_id">Paper Size</label>
							@foreach($sizes as $size)
                                <div class="radio">
                                    <label><input type="radio" name="paper_size_id" value="{{ $size->id }}"> {{ $size->size }} <small> ( {{ $size->presentPrice() }} / page ) </small></label>
                                </div>
                            @endforeach
						</div>

						<div class="form-group">
							<label for="print_type_id">Print Type</label>
							@foreach($types as $type)
                                <div class="radio">
                                    <label><input type="radio" name="print_type_id" value="{{ $type->id }}"> {{ $type->type }} <small> ( {{ $type->presentPrice() }} / page ) </small></label>
                                </div>
                            @endforeach
						</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary btn-flat">Submit</button>
					<a href="{{ route('request-files.index') }}" class="btn btn-danger btn-flat">Cancel</a>
				</div>
				</form>
			</div>
		</div>
		<div class="col-xs-2"></div>
	</div>
</section>



@endsection