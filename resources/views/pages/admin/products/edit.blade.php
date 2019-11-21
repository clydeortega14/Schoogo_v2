@extends('layouts.master')

@section('title', 'Products')

@section('content')

<section class="content-header">
    <h1>Products</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa fa-dashboard"></i> Products</a></li>
        <li class="active">Edit {{ $product->name }}</li>
    </ol>
</section>


<section class="content">
	
    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
            	<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            	@method('PUT')
        		@csrf
	                <div class="box box-primary">
	                    <div class="box-body">
	                    	<img src="{{ $product->image == null ? '/img/portfolio/thumnails/1.jpg' : asset('/uploads/images/products/'.$product->image) }}" alt="..." height="150" width="150" class="img-fluid mx-auto d-block">
	                        <div class="form-group">
	                            <label for="">Name</label>
	                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
	                        </div>

	                        <div class="form-group">
	                            <label for="">Description</label>
	                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
	                        </div>

	                        <div class="form-group">
	                            <label for="">Upload Image Here</label>
	                            <input type="file" name="image">
	                        </div>
	                    </div>


	                    <div class="box-footer">
	                        <button type="submit" class="btn btn-primary btn-flat">Save Changes</button>
	                        <a href="{{ route('products.index') }}" class="btn btn-danger btn-flat">Cancel</a>
	                    </div>
	                </div>
                </form>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-8">
            	<div class="box box-primary">
            		<div class="box-header">
            			{{ $product->name }} Categories
						<button type="button" class="btn btn-primary btn-flat pull-right" data-toggle="modal" data-target="#add-category">
							Add category
						</button>

						@include('pages.admin.categories.modals._add-category')
            		</div>

            		<div class="box-body">

            			<table class="table table-striped" id="example2">
            				<thead>
            					<th></th>
            					<th>Name</th>
            					<th>Description</th>
            					<th>Status</th>
            					<th>Action</th>
            				</thead>
            				<tbody>
            					@foreach($product->categories as $category)
									<tr>
										<td>
											<a href="#">
												<img src="{{ $category->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('/uploads/images/categories/'.$category->image)}}" alt="..." class="img-fluid mx-auto d-block" height="50" width="50">
											</a>
										</td>
										<td>{{$category->name}}</td>
										<td>{{$category->description}}</td>
										<td>
											<span class="{{ $category->status == true ? 'label label-success' : 'label label-danger '}}">
												{{ $category->status == true ? 'Active' : 'Inactive'}}
											</span>
										</td>
										<td>
											<a href="#" class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#edit-category-{{ $category->id}}">
												<i class="fa fa-edit"></i>
											</a> |

											<button type="button" class="btn btn-warning btn-xs btn-flat" data-toggle="modal" data-target="#update-status-{{ $category->id}}">
												<i class="fa fa-refresh"></i>
											</button> |

											<button type="button" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#delete-{{ $category->id}}">
												<i class="fa fa-trash"></i>
											</button> |
										</td>
									</tr>

									@include('pages.admin.categories.modals._edit-category')
									@include('pages.admin.categories.modals._update-status')
									@include('pages.admin.categories.modals._delete')
            					@endforeach
            				</tbody>
            			</table>
            		</div>
            	</div>
            </div>
        </div>

</section>

@endsection