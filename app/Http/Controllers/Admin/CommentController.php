<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::paginate(10); // Hiển thị 10 bình luận mỗi trang
        return view('admin.page.comments_page.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        // Xóa bình luận
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully');
    }
}
