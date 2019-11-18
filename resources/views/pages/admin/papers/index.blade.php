@extends('layouts.master')

@section('title', 'Papers Lists')

@section('content')

<section class="content-header">
    <h1>Papers</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Papers lists</li>
    </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Papers Lists</h3>
					<a href="{{ route('papers.create') }}" class="btn btn-primary btn-flat pull-right">Add paper</a>
				</div>

				<div class="box-body">
					<table class="table table-striped" id="example2">
						<thead>
							<th>Product Name</th>
							<th>Paper name</th>
							<th>GSM</th>
							<th>Price</th>
						</thead>
						<tbody>
							@foreach($papers as $paper)
								<tr>
									<td>{{ $paper->products->name}}</td>
									<td>{{ $paper->name}}</td>
									<td>{{ $paper->gsm}}</td>
									<td>{{ $paper->paperPrice() }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection