<section id="about">
  <div class="container">
    <div class="section-title h2 text-center mb-5">
      <h2 class="mb-0">All Snippet</h2>
      <span class="title-letter">S</span>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline">
          @foreach(getCategories() as $category)
            <li class="list-inline-item pb-3">
              <a class="btn btn-xs btn-light btn-pill" href="/user/category/{{$category->id}}">{{$category->name}}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-12">


        @foreach(getCategories() as $category)
          <?php $group = getGroup($category->id);?>
          @if(count($group))
            <h2>{{$category->name}}</h2>
            <ul>
              @foreach(getGroup($category->id) as $group_name)
                <h6 class="text-muted">{{$group_name}}</h6>
                <div class="list-group">
                  <ul>
                    @foreach(getCode($group_name) as $code)
                      <li>
                        <p>

                <span>
                  <a href="/user/create-snippet/{{$code->id}}" data-toggle="tooltip" data-placement="top"
                     title="Use Snipppet"><i class="far fa-file"
                                             aria-hidden="true"></i></a>
                  <a class="text-success" href="/user/edit-snippet/{{$code->id}}" title="Edit Snipppet"
                     data-toggle="tooltip"
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
            </ul>
          @endif
        @endforeach

      </div>
    </div>
  </div>
</section>
@push('styles')
  <link href="{{ asset('backend/easy-autocomplete/dist/easy-autocomplete.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <script src="{{asset('backend/easy-autocomplete/dist/jquery.easy-autocomplete.min.js')}}"></script>
  <script>
    var options = {

      url: function(phrase) {
        return "/user/group-list";
      },

      getValue: function(element) {
        return element.group;
      },

      ajaxSettings: {
        dataType: "json",
        method: "GET",
        data: {
          dataType: "json"
        }
      },

      preparePostData: function(data) {
        data.phrase = $("#example-ajax-post").val();
        return data;
      },

      requestDelay: 400
    };

    $("#example-ajax-post").easyAutocomplete(options);
  </script>
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