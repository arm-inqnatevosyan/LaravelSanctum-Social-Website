<?php

namespace App\Http\Controllers\Contacts\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class PostController extends BaseController
{
    public function __invoke(CommentRequest $request){
        $comment = new Comment();
        $comment->contact_id = $request->input('contact_id');
        $comment->title = $request->input('title');
        $comment->author = auth()->user()->name;
        $comment->save();
        
        return $this->sendSuccess($comment, 'success');
    }
}
