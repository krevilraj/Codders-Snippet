<section id="about">
  <div class="container">
    <div class="section-title h2 text-center mb-5">
      <h2 class="mb-0">Add Snippet</h2>
      <span class="title-letter">A</span>
    </div>
    <div class="row">
      <div class="col-md-12" id="add_snippet">
        <!-- general form elements -->
        <div class="card card-primary">

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
                <select wire:model="user_category"
                        class="js-example-basic-single form-control @error('user_category') is-invalid  @enderror"
                        name="state">
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
                <label for="exampleInputEmail1">Snippet
                  <small class="italic">(Note: Press CTRL + Q to covert into dynamic variable and it only works in
                    Insert Code Snippet <a href="/learn-about-dynamic-variable">Learn more..</a>)
                  </small>
                </label>
                {{--<button id="change-variable" type="button" style="z-index: 99999999;
          position: fixed;
          top: 0;">
                  Change to Dynamic
                </button>--}}
                <textarea name="template" cols="30" id="editor"
                          placeholder="Press CTRL + Q to covert into dynamic variable"
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


            <div class="card-footer footer-button">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
    </div>
  </div>
</section>


<!-- /.content -->

@push('scripts')

  <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('backend/rangyinputs-jquery-src.js')}}"></script>
  <script>

    $(document).ready(function () {
      var btn = document.createElement("BUTTON");   // Create a <button> element
      btn.setAttribute("id", "change-variable");
      btn.innerHTML = " Change to Dynamic";                   // Insert text
      btn.style.visibility = "hidden";
      document.body.appendChild(btn);


      var $ta = $("textarea.cke_source");
      var $startIndex = $("#startIndex"), $endIndex = $("#endIndex");

      function reportSelection() {
        $ta = $("textarea.cke_source");
        var sel = $ta.getSelection();
        $startIndex.text(sel.start);
        $endIndex.text(sel.end);
      }

      $(document).on("click", "#change-variable", function (e) {
        e.preventDefault();
        var extractString = $ta.extractSelectedText();
        var variable_name = extractString.replace(/[^A-Za-z_]/g, "");
        var replace_string = "[" + variable_name + "," + extractString + "," + extractString + "]"
        $ta.replaceSelectedText(replace_string, "select");
      })

      $(document).on("selectionchange", reportSelection);
      $ta.on("keyup input mouseup textInput", reportSelection);

      $ta.focus();

    });
  </script>
  <script>

    $(document).ready(function () {

      CKEDITOR.replace('editor', {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime'
      }).on('change', function (e) {
      @this.set('template', e.editor.getData());
      });
    });


    window.livewire.on('reset_editor', message => {
      CKEDITOR.instances['editor'].setData('');
      $('html, body').animate({scrollTop: '0px'}, 500, 'linear');
    });

    $(document).keydown(function (e) {
      //CTRL + Q keydown combo
      if (e.ctrlKey && e.keyCode == 81) {
        $('#change-variable').click();
      }
    })
  </script>
@endpush
@include('backend.partials.notification_message')

