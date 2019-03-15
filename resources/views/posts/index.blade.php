@extends('layouts.app')

@section('content')



@if (Auth::check())
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Created At</th>
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
      <td>{{$post->slug}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td>{{$post['created_at']->format('M d Y')}}</td>
      <td><a href="/posts/{{$post->id}}" class="btn btn-dark">view</a></td>
      <!-- Modal button -->
      <td><button type="button" data-toggle="modal" data-target="#postModal{{$post->id}}" class="btn btn-secondary">view ajax</button></td>
      <!-- Modal -->
      <div class="modal fade" id="postModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Post Details</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Title: <mark>{{$post->title}}</mark></h4>
              <h4>Description: <mark>{{$post->description}}</mark></h4>
              <h4>Slug: <mark>{{$post->slug != '' ? $post->slug : "Not found"}}</mark></h4>
              <h4>Username: <mark>{{ $post->user != null ? $post->user->name : "Not found" }}</mark></h4>
              <h4>User email: <mark>{{ $post->user != null ? $post->user->email : "Not found" }}</mark></h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>

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
<br>
<div class="d-flex justify-content-center">
  <a href="{{route('posts.restore')}}" class="btn btn-info" onclick="return confirm('Are you sure?')">Restore Deleted Posts</a>
</div>
<br>
<div class="d-flex justify-content-center">
  <a href="{{route('posts.create')}}" class="btn btn-success">New Post</a>
</div>
@else
<div class="text-center alert alert-danger">
    <h1>Sorry, You must login to view this page <a href="/login">Login</a></h1>
</div>
    @endif
@endsection