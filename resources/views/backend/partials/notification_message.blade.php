@push('scripts')
  <script src="{{asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>
  <script>
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
@push('styles')
  <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.min.css')}}">
@endpush