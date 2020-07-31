<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Republic;

class CommentController extends Controller
{
    public function createComment(Request $request) {
        $comment = new Comment;
        $comment->text = $request->text;
        $comment->user_id = $request->user_id;
        $comment->save();
        return response()->json($comment);
    }

    public function comentarUsuario($comment_id, $user_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->comentarUsuario($user_id);
        return response()->json($comment);
    }

    public function comentarRepublica($comment_id, $republic_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->comentarRepublica($republic_id);
        return response()->json($comment);
    }
}
