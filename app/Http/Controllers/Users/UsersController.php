<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends BaseController
{
    public function __invoke()
    {
        $contacts = User::query()->with('contacts.comments')->get();
        return $this->sendSuccess($contacts, 'success');
    }
}
