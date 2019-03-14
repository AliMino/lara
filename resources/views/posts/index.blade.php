@extends('layouts.app')

@section('content')


  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">View</th>
      <th scope="col">View AJAX</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td><a href="/posts/{{$post->id}}" class="btn btn-dark">view</a></td>
      <td><a href="/posts/{{$post->id}}" class="btn btn-secondary">view ajax</a></td>
      <td>
        <form id="{{$post->id}}" method="post" action="/posts/{{$post->id}}">
        {!! csrf_field() !!}
          <input id="{{$post->id}}" type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?')"></input>
          <input type="hidden" name="_method" value="delete" />
        </form>
      </td>
      <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
    </tr>
    @endforeach

  </tbody>
</table>
<div class="d-flex justify-content-center">
  {{$posts->links()}}
</div>
<div class="d-flex justify-content-center">
  <a href="{{route('posts.create')}}" class="btn btn-success">New Post</a>
</div>
@endsection