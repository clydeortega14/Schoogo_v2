@extends('layouts.master')

@section('title', 'Add Size')

@section('content')

<section class="content-header">
    <h1>Sizes</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('size.index') }}"><i class="fa fa-dashboard"></i> Sizes Lists</a></li>
        <li class="active">Add Size</li>
    </ol>
</section>

<section class="content container-fluid">
	<div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header">
                    {{-- Add Size here --}}
                </div>

                <form action="{{ isset($size) ? route('size.update', $size->id) : route('size.store') }}" method="POST" class="form-horizontal">
                    @if(isset($size))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product-id" class="col-sm-2 control-label">Products</label>
                            <div class="col-sm-6">
                                <select name="product_id" id="product-id" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id}}" {{ isset($size) && $product->id == $size->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category-id" class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-6">
                                <select name="category_id" id="category-id" class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-2 control-label">Size</label>
                            <div class="col-sm-6">
                                <input type="text" name="size" id="size" value="{{ isset($size) ? $size->size : '' }}" class="form-control" placeholder="Enter Size">
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ isset($size) ? 'Save Changes' : 'Submit' }}</button>
                        <a href="{{ route('size.index') }}" class="btn btn-danger btn-flat">Cancel</a>
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

        let product = $('#product-id')
        let prod_id = product.find('option:selected').val()

        getCategory(prod_id)

        $('#product-id').change((e) => {

            e.preventDefault()

            getCategory(e.target.value)
        })

    });
    function getCategory(prodId)
    {
        return $.get(url(prodId), function(data){
            
            categoryOptions(data);
        })
    }

    function categoryOptions(data)
    {
        let size_category = {{ isset($size) ? $size->category_id : ''}}
        $('#category-id').empty();
        $('#category-id').prepend(`<option value="">Select Category</option>`)
        data.forEach((index, value) => {
            $('#category-id').append(`<option value="${index.id}" ${index.id == size_category ? 'selected' : ''}>${index.name}</option>`)
        })
    }
    function url(prodId)
    {
        return `/api/get-categories/${prodId}`
    }
</script>

@endsection
