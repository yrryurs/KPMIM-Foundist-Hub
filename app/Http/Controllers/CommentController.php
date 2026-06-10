<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //Show comments from user from newest to oldest
    public function aboutus()
    {
        $comments=Comment::with('user')->latest()->get();
        return view('aboutus',compact('comments'));
    }

    //Handle comment submission
    public function store(Request $request)
    {
        $request->validate(['message'=>'required|string|max:1000',]);
        //Save comment to database
        Comment::create([
            'user_id'=>auth()->id(), //Assign the user's ID
            'message'=>$request->message,
        ]);
        //Feedback from system
        return back()->with('success', 'Comment submitted !');
    }
}
