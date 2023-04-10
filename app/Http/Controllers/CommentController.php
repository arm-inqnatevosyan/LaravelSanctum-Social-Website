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
    public function allDataa()
    {
        $contact = Contact::all();
        $comment = Comment::all();
        $data = [
            'users' => $contact,
            'comments' => $comment,
        ];

        return response()->json($data);
    }
    public function submit(CommentRequest $req){
        $contact = new Comment();
        $contact->title = $req->input('title');
        $contact->contact_id = $req->input('contact_id');
        $contact->save();
        return "success";
    }
}
