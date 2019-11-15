@extends('layouts.master')

@section('title', 'Pricing Create')

@section('content')

<section class="content-header">
    <h1>Pricing Create</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('pricings.index') }}"><i class="fa fa-dashboard"></i> Pricings Lists</a></li>
        <li class="active">Create Pricing</li>
    </ol>
</section>

<section class="content container-fluid">
	<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Create new</h3>
                    {{-- <a href="{{ route('pricings.create') }}" class="btn btn-primary btn-flat pull-right">Add Pricing</a> --}}
                </div>

                <div class="box-body">
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
