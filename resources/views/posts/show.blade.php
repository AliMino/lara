 @extends('layouts.app')

 @section('content')
 <a href="{{route('posts.index')}}" class="btn btn-danger">Home</a>

 
 <h1>ID: {{ $post->id }}</h1>
 <h1>Title: {{ $post->title }}</h1>
 <h1>Description: {{ $post->description }}</h1>
 <h1>Created at: {{ $post->created_at }}</h1>
 <h1>Updated at: {{ $post->updated_at }}</h1>
 <h1>Username: {{ $post->user != null ? $post->user->name : "Not found" }}</h1>

 
    

@endsection
 