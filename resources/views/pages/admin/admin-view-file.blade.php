@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <a href="">
                    	{{-- <img src="{{ asset('storage/'.$req_file->uploaded_file) }}" alt=""> --}}
                    	{{ asset('/storage/'.$req_file->uploaded_file) }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection