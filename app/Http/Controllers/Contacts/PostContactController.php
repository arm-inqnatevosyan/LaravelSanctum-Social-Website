<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class PostContactController extends BaseController
{
    public function __invoke(ContactRequest $request){ 
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->author = auth()->user()->id;
        $contact->subject = $request->input('description');
        $contact->category = $request->input('category');
        $contact->user_id = auth()->user()->id;
        $contact->save();

        $category = Category::query()->find($contact->category);
        $contact->categories()->attach($category);
        return $this->sendSuccess($contact, 'success');
    }
}
