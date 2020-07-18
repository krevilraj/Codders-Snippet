<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Snippet</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" id="add_snippet" wire:submit.prevent="addSnippet">
      @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
          {{ session('message') }}
        </div>
      @endif
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Template title</label>

          <input type="text" id="title" wire:model.debounce.500ms="title"
                 class="form-control @error('title') is-invalid  @enderror"
                 placeholder="Template title">
          @error('title')<span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Category</label>
          <select wire:model="user_category" class="js-example-basic-single form-control @error('user_category') is-invalid  @enderror" name="state">
            <option value="">Choose a Category</option>
            @if(isset($category))
              @foreach($category as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
              @endforeach
            @endif
          </select>
          @error('user_category')<span id="exampleInputEmail1-error"
                                  class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>



        <div class="form-group" wire:ignore>
          <label for="exampleInputEmail1">Snippet</label>
          <textarea name="template" cols="30" id="editor"
                    rows="10"></textarea>
        </div>
        @error('template')<span class="validation_error">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputEmail1">ShortCode</label>

          <input type="text" id="shortcode" wire:model.debounce.500ms="shortcode"
                 class="form-control @error('shortcode') is-invalid  @enderror"
                 placeholder="Shortcode">
          @error('shortcode')<span id="exampleInputEmail1-error"
                                   class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Group</label>

          <input type="text" id="group" wire:model.debounce.500ms="group"
                 class="form-control @error('shortcode') is-invalid  @enderror"
                 placeholder="Shortcode">
          @error('group')<span id="exampleInputEmail1-error"
                                   class="error invalid-feedback">{{ $message }}</span>
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
<!-- /.content -->

@push('scripts')

  <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
  <script>

    $(document).ready(function () {
      CKEDITOR.replace('editor', {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime'
      }).on('change', function (e) {
      @this.set('template', e.editor.getData());
      });
    })

    window.livewire.on('reset_editor', message => {
      CKEDITOR.instances['editor'].setData('');
      $('html, body').animate({scrollTop: '0px'}, 500, 'linear');
    });

  </script>
@endpush
@include('backend.partials.notification_message')

