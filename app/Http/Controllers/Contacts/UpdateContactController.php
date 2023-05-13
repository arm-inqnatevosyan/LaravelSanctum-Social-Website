<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class UpdateContactController extends BaseController
{
    public function __invoke($id,ContactRequest $request){
        $contact = Contact::query()->find($id);
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('description');
        $contact->save();
        return $this->sendSuccess($contact,'success');
    }
}
