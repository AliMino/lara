 @extends('layouts.app')

 @section('content')
 <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>

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

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
 