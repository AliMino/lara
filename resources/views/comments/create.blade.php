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

    <form action="{{route('comments.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Comment</label>
            <textarea name="comment" class="form-control"></textarea>
        </div>
        <input type="hidden" name="post" value="{{$post}}"></input>
        <input type="hidden" name="user" value="{{Auth::user()->id}}"></input>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
 