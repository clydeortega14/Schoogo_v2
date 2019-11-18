@extends('layouts.master')

@section('title', 'Pricing Lists')

@section('content')

<section class="content-header">
    <h1>Pricing</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pricings lists</li>
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
                    <h3 class="box-title">Lists</h3>
                    <a href="{{ route('pricings.create') }}" class="btn btn-primary btn-flat pull-right">Add Pricing</a>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-hover" id="example2">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Categories</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($pricings as $pricing)
                            <tr>
                                <td>{{ $pricing->product->name}}</td>
                                <td>{{ $pricing->categories->name}}</td>
                                <td>{{ $pricing->size}}</td>
                                <td>{{ $pricing->quantity}}</td>
                                <td>{{ $pricing->formattedPrice() }}</td>
                                <td>
                                    <form action="{{ route('pricings.destroy', $pricing->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    <a href="{{ route('pricings.edit', $pricing->id) }}" class="btn btn-primary btn-xs btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a> |
                                    <button type="submit" class="btn btn-danger btn-xs btn-flat">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
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
