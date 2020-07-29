<section id="about">
  <div class="container">
    <div class="section-title h2 text-center mb-5">
      <h2 class="mb-0">Add Snippet</h2>
      <span class="title-letter">S</span>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="/dashboard/show-template" method="post">
          @csrf
          @if (session()->has('message'))
            <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
              {{ session('message') }}
            </div>
          @endif
          <div class="card-body">
            <input type="hidden" name="_id" value="{{$code->id}}">
            @foreach($code->variable as $data)
              <div class="form-group">
                <label for="exampleInputEmail1">{{$data->placeholder}}</label>

                <input type="{{$data->type}}" id="title" name="{{$data->name}}" value="{{$data->value}}"
                       class="form-control" required
                       placeholder="{{$data->placeholder}}">

              </div>
            @endforeach
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




