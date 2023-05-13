<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class GetContactController extends BaseController
{
    public function __invoke()
    {
        $contacts = Contact::query()->with('comments')->get();
        return $this->sendSuccess($contacts, 'success');
    }
}
