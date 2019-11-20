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
                   
                        <div class="form-group">
                          <label for="product" class="col-sm-3 control-label">Products</label>

                          <div class="col-sm-8">
                            <select name="product_id" id="product" class="form-control">
                                {{-- <option value=""> Select Product</option> --}}
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ isset($pricing) && $product->id == $pricing->product_id ? 'selected' : '' }}>{{ $product->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="category_id"  class="col-sm-3 control-label">Categories</label>

                          <div class="col-sm-8">
                            <select name="category_id" id="categories" class="form-control">
                                @if(isset($pricing))
                                    <input type="hidden" id="pricing" value="{{ $pricing->category_id}}">
                                    @foreach($product->categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $pricing->category_id ? 'selected' : ''}}> {{ $pricing->categories->name }}</option>
                                    @endforeach
                                @else
                                    {{-- <option value="">Selecte Category</option> --}}
                                @endif
                            </select>
                          </div>
                        </div>
                        

                        <div class="form-group">
                          <label for="size" class="col-sm-3 control-label">Size</label>

                          <div class="col-sm-8">
                            <select name="size" id="size" class="form-control">
                                @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
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
                            <input type="number" value="{{ isset($pricing) ? $pricing->formattedPrice() : '' }}"name="price" class="form-control">
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

        getCategories();
        var pricing = $('#pricing').val();

        function getCategories()
        {
            let id = $('#product').val();
            let url = `/api/product-categories/${id}`;
            Ajax(url)

        }
        $('#product').change(function(e){

            var product_id = e.target.value;
            var url = `/api/product-categories/${product_id}`;
            Ajax(url);
        })

        function Ajax(url)
        {
            return $.ajax({

                method : 'get',
                url : url,
                success : function(response){
                        console.log(pricing)
                    $('#categories').empty()
                    $('#categories').prepend(`<option value="">Select Category</option`)
                    response.forEach(function(category){
                        $('#categories').append(`<option value="${category.id}" ${pricing === category.id ? 'selected' : '' }>${category.name}</option`)
                    });
                },
                error : function(error){
                    console.log(error)
                }
            })
        }


    })
</script>


@endsection
