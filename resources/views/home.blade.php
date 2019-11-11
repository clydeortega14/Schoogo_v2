@extends('layouts.master')

@section('title', 'Home')

@section('content')


<section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content container-fluid">
    
{{--     @if(auth()->user()->role_id == 1)
    	@include('partials.home.admin-info')
    @else
		@include('partials.home.member-info')
    @endif

    @include('partials.home.recent-request') --}}

</section>

@endsection
