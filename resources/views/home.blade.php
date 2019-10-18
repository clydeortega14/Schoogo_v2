@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Document</th>
                                            <th>Sender Name</th>
                                            <th>Address</th>
                                            <th>Contact_number</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($resources as $resource)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('view.file', ['id' => $resource->id]) }}" target="_blank">
                                                        <img src="{{ asset('/img/files/file1.jpg') }}" alt="..." class="img-fluid mx-auto d-block" height="50" width="50">
                                                    </a>
                                                </td>
                                                <td>{{ $resource->name }}</td>
                                                <td>{{ $resource->address }}</td>
                                                <td>{{ $resource->contact_number }}</td>
                                                <td>
                                                    <a href="{{ route('request-files.edit', ['id' => $resource->id]) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('download.file', ['id' => $resource->id]) }}" class="btn btn-info btn-sm">
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
            </div>
        </div>
    </div>
</div>
@endsection
