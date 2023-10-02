@extends ('layout')
@section ('content')
<form action="/article" method="post">
    @csrf
    @if ($errors -> any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <ul>
                    <li>
                        {{$error}}
                    </li>
                </ul>
            @endforeach
        </div>
    @endif
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="shortDesc" class="form-label">ShortDesc</label>
    <input type="text" class="form-control" name="shortDesc" id="shortDesc">
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Desc</label>
    <input type="text" class="form-control" name="desc" id="desc">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection