@extends('backend.layouts.app')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Snippet</h3>
          </div>
          <div style="padding:0 16px">
            {!! $template !!}
          </div>

        </div>
      </div>


    </div>


  </section>


@endsection

@push('scripts')
  <script src="{{asset('backend/prism/prism.js')}}"></script>

  <script>

    $(document).ready(function() {
      $('.download-button').click(function () {
        var button = $(this);
        button.tooltip({'placement': 'top'});
        const copyText = button.siblings( "xmp" ).html();
        var filename = button.attr('data-filename');
        saveTextAsFile(copyText.trim(),filename);
      });
    });
  </script>

  <script type="text/javascript">
    function saveTextAsFile(textToWrite, fileNameToSaveAs)
    {
      alert('test');
      var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
      var downloadLink = document.createElement("a");
      downloadLink.download = fileNameToSaveAs;
      downloadLink.innerHTML = "Download File";
      if (window.webkitURL != null)
      {
        // Chrome allows the link to be clicked
        // without actually adding it to the DOM.
        downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
      }
      else
      {
        // Firefox requires the link to be added to the DOM
        // before it can be clicked.
        downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
        downloadLink.onclick = destroyClickedElement;
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
      }

      downloadLink.click();
    }
  </script>
@endpush
@push('styles')
  <link href="{{asset('backend/prism/prism.css')}}" rel="stylesheet"/>
@endpush