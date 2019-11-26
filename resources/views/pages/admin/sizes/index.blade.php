@extends('layouts.master')

@section('title', 'Sizes')

@section('content')

<section class="content-header">
    <h1>Sizes</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Size Lists</li>
    </ol>
</section>

<section class="content container-fluid">
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ session('success') }}
                </div>
            @endif

            <div class="box box-primary">
                <div class="box-header">
                    <a href="{{ route('size.create') }}" class="btn btn-primary btn-flat pull-right">Add Size</a>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover" id="example2">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Size</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($sizes as $size)
                                <tr>
                                    <td>{{ $size->products->name }}</td>
                                    <td>{{ $size->category_id == null ? 'None' : $size->categories->name }}</td>
                                    <td>{{ $size->size }}</td>
                                    <td>
                                        <a href="{{ route('size.edit', $size->id) }}" class="btn btn-primary btn-xs btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a> |
                                        <a href="{{ route('size.destroy', $size->id) }}" class="btn btn-danger btn-xs btn-flat">
                                            <i class="fa fa-trash"></i>
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
