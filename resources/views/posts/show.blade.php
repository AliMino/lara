 @extends('layouts.app')

 @section('content')

<div class="limiter">
<div class="wrap-table100">
        <div class="table100 ver3 m-b-110">
            <div class="table100-head">
                <table>
                    <thead>
                        <tr class="row100 head">
                            <th class="cell100 column5">ID</th>
                            <th class="cell100 column5">Title</th>
                            <th class="cell100 column2">Description</th>
                            <th class="cell100 column1">Created At</th>
                            <th class="cell100 column2">Post Creator Name</th>
                            <th class="cell100 column2">Post Creator Email</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="table100-body js-pscroll">
                <table>
                    <tbody>
                        <tr class="row100 body">
                            <td class="cell100 column5">{{ $post->id }}</td>
                            <td class="cell100 column5">{{ $post->title }}</td>
                            <td class="cell100 column2">{{ $post->description }}</td>
                            <td class="cell100 column1">{{ $post->created_at->format("l jS \\of F Y h:i:s A") }}</td>
                            <td class="cell100 column2">{{ $post->user != null ? $post->user->name : "Not found" }}</td>
                            <td class="cell100 column2">{{ $post->user != null ? $post->user->email : "Not found" }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="text-center alert alert-danger">
<a href="/posts/{{$post->id}}/comment/create" class="btn btn-info">Add comment</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Comment</th>
            <th scope="col">User</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td scope="row">{{$comment->id}}</td>
            <td>{{$comment->comment}}</td>
            <td>{{ isset($comment->user) ? $comment->user->name : 'Not Found'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
 