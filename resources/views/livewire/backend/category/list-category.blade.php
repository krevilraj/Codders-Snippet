<div class='col-md-8'>

  <div class='card'>
    <div class='card-header'>
      <h3 class='card-title'>DataTable with default features</h3>


    </div>
    <!-- /.card-header -->
    <div class='card-body'>
      <table class='example1 table table-bordered table-striped'>
        <thead>
        <tr>
          <th>Name</th>
          <th>Slug</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
              <button type="button" class="btn btn-info btn-flat  " id="name-{{$category->id}}"
                      data-name="{{$category->name}}" onclick="editRow({{$category->id}})">
                <span class="far fa-edit" aria-hidden="true"></span> Edit
              </button>
              <button onclick="confirm('Are you sure to delete?') && deleteRow({{$category->id}})" type="button"
                      class="btn btn-danger btn-flat  ">
                <span class="far fa-trash-alt" aria-hidden="true"></span> Delete
              </button>
            </td>
          </tr>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Slug</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@push('styles')
  <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">
@endpush

@push('scripts')
  <!-- DataTables -->
  <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>

  <script>
    function deleteRow(id) {
      window.livewire.emit('deleteRow', id)
    }

    function editRow(id) {
      $('.selectedRows').removeClass("selectedRows");
      $('#name-'+id).closest('tr').addClass("selectedRows");
      var inputfield = $('#insertinput');
      inputfield.attr("title","Edit Category name")
      inputfield.tooltip('show');
      window.livewire.emit('editRow', id)
    }

    $(function () {
      $('.example1').dataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('[data-toggle="tooltip"]').on("mouseleave", function(){
        $(this).tooltip("hide");
      })
    });
    window.livewire.on('refresh_table', message => {
      $('.example1').dataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
    window.livewire.on('sweetMessage', message => {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      Toast.fire({
        icon: message[0],
        title: message[1]
      });
    });
  </script>

@endpush