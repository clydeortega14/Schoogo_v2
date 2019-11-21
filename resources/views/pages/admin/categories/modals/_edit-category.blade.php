<div class="modal fade" id="edit-category-{{$category->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
          @method('PUT')
          @csrf

          <div class="modal-body">

            <input type="hidden" name="product_id" value="{{ $product->id}}">
            
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" placeholder="Enter Name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-10">
                  <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Description" required>{{ $category->description}}</textarea>
                </div>
            </div>
          
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Upload Image</label>

                  <div class="col-sm-10">
                    <input type="file" name="image">
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6">
                <img src="{{ $category->image == null ? '/img/portfolio/thumbnails/1.jpg' : asset('/uploads/images/categories/'.$category->image) }}" alt="..." height="100" width="100" class="img-fluid mx-auto d-block">
              </div>
            </div>
            

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>

        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->