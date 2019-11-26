@extends('layouts.master')

@section('title', 'Pricing Create')

@section('content')

<section class="content-header">
    <h1>Product Pricing</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('pricings.index') }}"><i class="fa fa-dashboard"></i> Pricings Lists</a></li>
        <li class="active">Create Pricing</li>
    </ol>
</section>

<section class="content container-fluid">
	<div class="row">
        <div class="col-xs-12 col-sm-8">

             @if(session()->has('message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-close"></i> Oops!</h4>
                    {{ session('message') }}
                </div>
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">add new pricing</h3>
                </div>

                <form action="{{ isset($pricing) ? route('pricings.update', $pricing->id) : route('pricings.store') }}" method="POST" class="form-horizontal">
                    @if(isset($pricing))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="box-body">
                        @if(isset($pricing))
                            <input type="hidden" id="pricing-size-id" value="{{ $pricing->sizes->id }}">
                        @endif
                        <div class="form-group">
                          <label for="product" class="col-sm-3 control-label">Products</label>

                          <div class="col-sm-8">
                            <select name="product_id" id="product" class="form-control">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ isset($pricing) && $product->id == $pricing->sizes->product_id ? 'selected' : '' }}>{{ $product->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="category-id"  class="col-sm-3 control-label">Categories</label>

                          <div class="col-sm-8">
                            <select name="category_id" id="category-id" class="form-control"></select>
                          </div>
                        </div>
                        

                        <div class="form-group">
                          <label for="size" class="col-sm-3 control-label">Size</label>

                          <div class="col-sm-8">
                            <select name="size" id="size" class="form-control"></select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="quantity" class="col-sm-3 control-label">Quantity</label>

                          <div class="col-sm-3">
                            <input type="number" value="{{ isset($pricing) ? $pricing->quantity : 1 }}" min="1" name="quantity" class="form-control">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price" class="col-sm-3 control-label">Price</label>

                          <div class="col-sm-8">
                            <input type="number" value="{{ isset($pricing) ? $pricing->price : '' }}"name="price" class="form-control">
                          </div>
                        </div>
                    </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ isset($pricing) ? 'Save Changes' : 'Submit' }}</button>
                    <a href="{{ route('pricings.index') }}" class="btn btn-danger btn-flat">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom_js')
<script type="text/javascript">
    
    $(function(){

        let product = $('#product');
        $.get(url(product.find('option:selected').val()), function(response){
            categoryOptions(response)
            getSize()
        })

        product.change((e) => {

            e.preventDefault()
            $.get(url(e.target.value), (response) => {

                categoryOptions(response)
                getSize()
            })
        })
    })


    function categoryOptions(response)
    {
        let $category = '{{ isset($pricing) ? $pricing->sizes->category_id : '' }}'
        $('#category-id').empty()
        $('#category-id').prepend(`<option value="">Select Category</option>`)
        response.forEach(function(category){
            $('#category-id').append(`<option value="${category.id}" ${category.id == $category ? 'selected' : ''}>${category.name}</option`)
        });
    }

    function sizeOptions(data)
    {
        let size = $('#size')
        let pricing_size_id = '{{ isset($pricing) ? $pricing->sizes->id : '' }}'
        size.empty()
        data.forEach((index, value) => {
            size.append(`<option value="${index.id}" ${index.id == pricing_size_id ? 'selected' : ''}>${index.size}</option>`)
        })
    }
    function getSize()
    {
        let product = $('#product')
        let url = sizeUrl(product.val())

        $.get(url, function(data){
            sizeOptions(data)
        })
    }

    function url(prodId)
    {
        return `/api/get-categories/${prodId}`
    }
    function sizeUrl(prodId)
    {
        return `/api/get-size/${prodId}`
    }
</script>


@endsection
