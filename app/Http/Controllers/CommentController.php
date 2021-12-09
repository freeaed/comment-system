<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return view('index');
    }
    public function fetchComments(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
    return CommentResource::collection(Comment::whereReplayId(0)->latest()->get());
    }
    public function AddComment(Request $request){
        $comment = Comment::create(['user' =>$request->name, 'comment' => $request->comment,'replay_id'=>$request->replayId]);
        return response(CommentResource::collection(Comment::whereReplayId(0)->latest()->get()),201);
    }
}
