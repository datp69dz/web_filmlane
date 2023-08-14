
@extends('admin.layout.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Account ID</th>
                <th>Movie Name</th>
                <th>Admin </th>
                <th>Content</th>
                <th>Comment Date</th>
                <th>Comment Update</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->comment_id }}</td>
                    <td><img style="widght:50px ; height:60px ; padding-right:10px" src="{{ asset('storage/uploads/movies/' . $comment->movie->image_url) }}" alt="{{ $comment->movie->image_url}}">{{ $comment->movie->title }} </td>
                    <td>{{ $comment->account->username }}</td>
                    <td>{{ $comment->admin_id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->comment_date }}</td>
                    <td>{{ $comment->comment_update }}</td>
                    <td>
                        <form action="{{ route('comments.destroy', $comment->comment_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
