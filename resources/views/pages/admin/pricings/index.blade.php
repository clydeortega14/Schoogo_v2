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
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
