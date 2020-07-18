<div class='col-md-12'>

  <div class='card'>
    <div class='card-header'>
      <h3 class='card-title'>DataTable with default features</h3>


    </div>
    <!-- /.card-header -->
    <div class='card-body'>
      <table class='example1 table table-bordered table-striped'>
        <thead>
        <tr>
          <th>Title</th>
          <th>Category</th>
          <th>Group</th>
          <th>Shortcode</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($codes as $code)
          <tr>
            <td>{{$code->title}}</td>
            <td>{{$code->category->name}}</td>
            <td>{{$code->group}}</td>
            <td>{{$code->shortcode}}</td>
            <td>
              <a href="/dashboard/view-snippet/{{$code->id}}">
                <button title="Use Snippet" type="button" class="btn btn-info btn-flat  " id="name-{{$code->id}}"
                        data-name="{{$code->title}}">
                  <span class="far fa-file" aria-hidden="true"></span>
                </button>
              </a>
              <button title="Edit" type="button" class="btn btn-info btn-flat  " id="name-{{$code->id}}"
                      data-name="{{$code->title}}" onclick="editRow({{$code->id}})">
                <span class="far fa-edit" aria-hidden="true"></span>
              </button>
              <button title="Delete" onclick="confirm('Are you sure to delete?') && deleteRow({{$code->id}})"
                      type="button"
                      class="btn btn-danger btn-flat  ">
                <span class="far fa-trash-alt" aria-hidden="true"></span>
              </button>
            </td>
          </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
          <th>Title</th>
          <th>Category</th>
          <th>Group</th>
          <th>Shortcode</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>


@push('scripts')
  <!-- DataTables -->
  <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


  <script>
    function deleteRow(id) {
      window.livewire.emit('deleteRow', id)
    }

    function editRow(id) {
      $('.selectedRows').removeClass("selectedRows");
      $('#name-' + id).closest('tr').addClass("selectedRows");
      var inputfield = $('#insertinput');
      inputfield.attr("title", "Edit Category name")
      inputfield.tooltip('show');
      window.livewire.emit('editRow', id)
    }

    $(function () {
      $('.example1').dataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('[data-toggle="tooltip"]').on("mouseleave", function () {
        $(this).tooltip("hide");
      })
    });
    window.livewire.on('refresh_table', message => {
      $('.example1').dataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>

@endpush
@include('backend.partials.notification_message')