<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;

class ContactController extends BaseController
{
    public function submit(ContactRequest $req){ 
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('description');
        $contact->category = $req->input('category');
        $contact->user_id = auth()->user()->id;
        $contact->save();

        $category = Category::find($contact->category);
        $contact->categories()->attach($category);
        return $this->sendSuccses($contact, 'succses');
    }
    public function allData(){
        $contacts = User::with('contacts.comments')->get();
        return $contacts;
    }
    public function showOneMessage($id){
        $contact = new Contact();
        return ['data' => $contact->find($id)];
    }
    public function updateMessageSubmit($id,ContactRequest $req){
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('description');
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
}
