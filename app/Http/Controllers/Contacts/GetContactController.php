<?php

namespace App\Http\Controllers\Contacts;
use App\Models\Like;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class GetContactController extends BaseController
{
    public function __invoke()
    {
        // $check = Like::query()->where('id', Auth::user()->id);
        // dd($check);
        $contacts = Contact::query()->with('comments')->with('likes')->get();
        return $this->sendSuccess($contacts, 'success');

    }
}
