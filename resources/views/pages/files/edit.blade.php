@extends('layouts.app')

@section('title', 'Show Print Request')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Information</h5>
				</div>

				<div class="card-body">
					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Full Name</b> : </label>
						<div class="col-xs-12 col-md-6">
							<label style="padding-top: 8px;">{{ $file->name }}</label>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Address</b> : </label>
						<div class="col-xs-12 col-md-6">
							<label style="padding-top: 8px;">{{ $file->address }}</label>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Contact Number</b> : </label>
						<div class="col-xs-12 col-md-6">
							<label style="padding-top: 8px;">{{ $file->contact_number }}</label>
						</div>
					</div>
				</div>
			</div>
			{{-- <br> --}}
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Document Information</h5>
				</div>

				<div class="card-body">
					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Document Title</b> : </label>
						<div class="col-xs-12 col-md-6">
							<label style="padding-top: 8px;">{{ $file->purpose }}</label>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Summary</b> : </label>
						<div class="col-xs-12 col-md-6">
							<p style="padding-top: 8px;">{{ $file->purpose }}</p>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Files</b> : </label>
							<a href="{{ route('view.file', ['id' => $file->id]) }}">
								<img src="/img/files/file1.jpg" alt="" class="img-fluid mx-auto d-block" height="70" width="70">
							</a>
					</div>


					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Paper Size</b> : </label>
						<div class="col-xs-12 col-md-6">
							<p style="padding-top: 8px;">{{ $file->size->size  }} <small>( {{ $file->size->presentPrice() }} / per page )</small></p>
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-xs-6 col-md-4 col-form-label text-md-right"><b>Print Type</b> : </label>
						<div class="col-xs-12 col-md-6">
							<p style="padding-top: 8px;">{{ $file->type->type  }} <small>( {{ $file->type->presentPrice() }} / per page ) </small> </p>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6">
			<div class="card">
				<div class="card-header">
					<h5>Billing</h5>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Price per page</th>
									<th>Number of Pages</th>
									<th>Total Price</th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ number_format($file->size->presentPrice() + $file->type->presentPrice(), 2) }}</td>
									<td><input type="number" min="1" value="1" class="form-control" style="height: 100%; max-width: auto;"></td>
									<td>{{ number_format($file->size->presentPrice() + $file->type->presentPrice(), 2) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection