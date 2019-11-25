@extends('layouts.landing')

@section('title', 'Welcome')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xs-12 col-md-12">
			<div id="header">
				<h1 class="text-center">Inksite <br>
				Motoprint</h1>
				<h4 class="text-center">
					if you think it, we can ink it.
				</h4>
				<div class="text-center">
					<a href="{{ route('get.products') }}" class="btn btn-outline-secondary align-center">Get started</a>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection