<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function AddComment($id , Request $request){
        $comment = $request->validate([
            'content' => 'required|string|max:255'
        ]);
        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'event_id' => $id
        ]);
        return redirect()->back();
    }
    public function DeleteComment(Request $request){
        $id = $request->id;
        $Del = Comment::find($id);
        $Del->delete();
        return redirect()->back();
    }
}
