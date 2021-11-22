<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $postId){
        $request->validate([
            'text' =>'required'
        ]);
        Comment::create([
            'post_id' =>$postId,
            'user_id' =>Auth::user()->id,
            'text' => $request->text,
        ]);
        return back();
    }
}
