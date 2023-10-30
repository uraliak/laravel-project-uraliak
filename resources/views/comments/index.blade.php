@extends('layout')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Name Article</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($comments as $comment)
    <tr>
      <th scope="row">{{$comment->created_at}}</th>
      @foreach($articles as $article)
      @if ($comment->article_id == $article->id)
      <td>{{$article->name}}</a></td>
      @endif
      @endforeach
      <td>{{$comment->title}}</td>
      <td>{{$comment->text}}</td>
      <td><a href="/comment/accept/{{$comment->id}}" class="btn btn-primary">Accept</a></td>
      <td><a href="/comment/reject/{{$comment->id}}" class="btn btn-danger">Reject</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$comments->links()}}
@endsection

    

       