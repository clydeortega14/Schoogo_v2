@extends('layouts.master')

@section('title', 'Request Files')

@section('content')


<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">request files</li>
    </ol>
</section>

<section class="content container-fluid">
    
    <div class="row">
        <div class="col-xs-12">
            
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Print Requests</h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover" id="example2">
                        <thead>
                            <tr>
                                <th>Document</th>
                                <th>Sender</th>
                                <th>Document Name </th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resources as $resource)
								<tr>
									<td>
										<img src="/img/files/file1.jpg" alt="..." class="img-fluid mx-auto d-block" height="70" width="70">
									</td>
									<td>{{ $resource->name }}</td>
									<td>{{ $resource->purpose }}</td>
									<td>{{ $resource->contact_number }}</td>
									<td>
										<a href="{{ route('view', ['id' => $resource->id]) }}" class="btn btn-success btn-flat btn-sm">
											<i class="fa fa-street-view"></i>
										</a> |
										<a href="{{ route('print.file', ['id' => $resource->id]) }}" class="btn btn-primary btn-flat btn-sm">
											<i class="fa fa-print"></i>
										</a> |
										<a href="{{ route('download.file', ['id' => $resource->id]) }}" class="btn btn-info btn-flat btn-sm">
											<i class="fa fa-download"></i>
										</a>
									</td>
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