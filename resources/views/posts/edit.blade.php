 @extends('layouts.app')

 @section('content')

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('posts.update', $post)}}" method="post">
        <!-- @csrf -->
        {{ csrf_field()}}
        <input name="_method" type="hidden" value="PUT">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{$post->description}}</textarea>
        </div>
        <select class="form-control" name="user_id">
            @foreach($users as $user)
            @if($post->user_id == $user->id)
                <option value="{{$user->id}}" selected>{{$user->name}}</option>
            @else
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
            @endforeach
        </select>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
 