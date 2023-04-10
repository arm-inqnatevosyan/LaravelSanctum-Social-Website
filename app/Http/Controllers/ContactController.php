<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Comment;

class ContactController extends Controller
{
    public function submit(ContactRequest $req){
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');

        $contact->save();

        return "success";
    }
    public function allData(){
        return ['data' => Contact::all()];
    }
    public function showOneMessage($id){
        $contact = new Contact();
        return ['data' => $contact->find($id)];
    }
    public function updateMessageSubmit($id,ContactRequest $req){
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->email = $req->input('subject');
        $contact->save();
        return $contact;
    }
    public function deleteMessage($id){
        $delete = Contact::find($id)->delete();
        return $delete;
    }
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
        $posts = Contact::whereRelation('Comment', 'is_approved', false)->get();

        return response()->json($data);
    }
}
