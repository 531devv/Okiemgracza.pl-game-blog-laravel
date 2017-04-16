@if (Session::has('success'))
  <div class="alert alert-success" role="alert">
    <strong>Success:</strong> {{ Session::get('success') }}
  </div>
@endif

@if (count($errors)>0)
  <div class="alert alert-danger" role="alert">
    <strong>Błąd:</strong>
    <ul>
    @foreach($errors->all() as $error)
    @endforeach
    <li style="margin-left:20px;">{{$error}}</li>
    </ul>
  </div>
@endif

@if(session::has('error'))
  <div class="alert alert-danger" style="margin-top:10px;" role="alert">
    <strong>Błąd:</strong>
    <ul>
      <li style="margin-left:20px;">{{ session::get('error') }}</li>
    </ul>
  </div>
@endif
