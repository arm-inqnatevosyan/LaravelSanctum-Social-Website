<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::with('comments')->get();
        return $contacts;
    }
    public function submit(CommentRequest $req){
        $comment = new Comment();
        $comment->contact_id = $req->input('contact_id');
        $comment->title = $req->input('title');
        $comment->author = auth()->user()->name;
        $comment->save();
        
        return $comment;
    }
}
