<section id="about">
  <div class="container">
    <div class="section-title h2 text-center mb-5">
      <h2 class="mb-0">All Snippet of {{$category->name}}</h2>
      <span class="title-letter">{{ucfirst(substr($category->name,0,1))}}</span>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline">
          @foreach(getCategories() as $cat)
            <li class="list-inline-item pb-3">
              <a class="btn btn-xs btn-light btn-pill" href="/user/category/{{$cat->id}}">{{$cat->name}}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-12">

        @foreach($groups as $group_name)
          <h6 class="text-muted">{{$group_name}}</h6>
          <div class="list-group">
            <ul>
              @foreach(getCodeCategory($group_name,$category->id) as $code)
                <li>
                  <p>

                <span>
                  <a href="/user/create-snippet/{{$code->id}}" data-toggle="tooltip" data-placement="top"
                     title="Use Snipppet"><i class="far fa-file"
                                             aria-hidden="true"></i></a>
                  <a href="/user/edit-snippet/{{$code->id}}" title="Edit Snipppet" data-toggle="tooltip"
                     data-placement="top"><i class="far fa-edit"
                                             aria-hidden="true"></i></a>
                  <a class="text-danger" title="Delete"
                     onclick="confirm('Are you sure to delete?') && deleteRow({{$code->id}})"
                  >
                <i class="far fa-trash-alt" aria-hidden="true"></i>
              </a>
                </span>
                    {{$code->title}}
                    <small>({{$code->group}})</small>
                  </p>
                </li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


@push('scripts')
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    function deleteRow(id) {
      window.livewire.emit('deleteRow', id)
    }
  </script>

@endpush
@include('backend.partials.notification_message')