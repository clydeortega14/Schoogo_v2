<div class="modal fade" id="update-status-{{$category->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Status</h4>
        </div>
        <form action="{{ route('update.status', $category->id) }}" method="POST">
          @method('PUT')
          @csrf

          <div class="modal-body">

            <h3 class="text-center">
              <strong>Are you sure?</strong><br>
              <small>You want to <b class="{{ $category->status == true ? 'text-danger' : 'text-success'}}">{{ $category->status == true ? 'Deactivate' : 'Active'}}</b> {{ $category->name }}</small>
            </h3>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Continue</button>
          </div>

        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->