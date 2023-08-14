// resources/views/comments/delete.blade.php

@extends('admin.layout.app')

@section('content')
<div class="container">
    <h2>Delete Comment</h2>
    <p>Are you sure you want to delete this comment?</p>
    <form action="{{ route('comments.destroy', $comment->comment_id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
</div>
@endsection
