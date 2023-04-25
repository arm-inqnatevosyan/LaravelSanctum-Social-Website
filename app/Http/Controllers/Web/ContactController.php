<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Comment;

class ContactController extends Controller
{
    public function submit(ContactRequest $req){
        // $validated = $this->validate($req,[
            // 'name' => 'required|min:3|max:50',
            // 'email' => 'required|email|min:5|max:50',
            // 'subject' => 'required|min:5|max:50'
        // ]);
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');

        $contact->save();

        return redirect()->route('home')->with('success','Message Add ...');
    }
    public function allData(){
        return view('messages',['data' => Contact::all()]);
    }
    public function showOneMessage($id){
        $contact = new Contact();
        return view('one-message',['data' => $contact->find($id)]);
    }
    public function updateMessage($id){
        $contact = new Contact();
        return view('update-message',['data' => $contact->find($id)]);
    }
    public function updateMessageSubmit($id,ContactRequest $req){
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');

        $contact->save();

        return redirect()->route('contact-data',$id)->with('success','Message Update ...');
    }
    public function deleteMessage($id){
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success','Message Deleted');
    }
    public function index()
    {
        $contact = Contact::all();
        $comment = $contact->posts;
        return (json_decode($contact));
    }
}
