<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\CommentRequest;

class GetCommentController extends BaseController
{
    public function __invoke(CommentRequest $request)
    {
        $contacts = Contact::query()->with('comments')->get();
        return $this->sendSuccess($contacts, 'success');
    }
}
