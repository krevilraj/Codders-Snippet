<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Snippet</h3>
    </div>

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
  <div>

