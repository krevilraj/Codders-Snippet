<div class="col-md-4">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" wire:submit.prevent="addCategory">
      @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
          {{ session('message') }}
        </div>
      @endif
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Category Name</label>

          <input type="text" id="insertinput" wire:model.debounce.500ms="name" title="Change Category" data-toggle="tooltip"
                 class="form-control @error('name') is-invalid  @enderror" id="exampleInputEmail1"
                 placeholder="Enter email">
          @error('name')<span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

</div>
