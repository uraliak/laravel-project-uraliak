@extends('layout')
@section('content')
<div class="card" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->name}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$article->short_desc}}</h6>
    <p class="card-text">{{$article->desc}}</p>
    <div class="d-inline-flex gap-1">
        <a href="/article/{{$article->id}}/edit" class="btn btn-primary">Update</a>
        <a href="#" class="btn btn-secondary">Add comment</a>
        <form action="/article/{{$article->id}}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
  </div>
</div>
<h3>Comments</h3>
@foreach($comments as $comment)
<div class="card" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">{{$comment->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$comment->text}}</h6>
    <div class="d-inline-flex gap-1">
        <a href="/article/{{$comment->id}}/edit" class="btn btn-primary">Update</a>
        <a href="#" class="btn btn-secondary">Delete</a>
    </div>
  </div>
</div>
@endforeach
@endsection