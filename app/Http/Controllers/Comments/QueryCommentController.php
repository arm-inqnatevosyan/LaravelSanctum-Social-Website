<?php

namespace App\Http\Controllers\Comments;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class QueryCommentController extends BaseController
{
    
    public function __invoke()
    {
        $postsWithRecentComments = Contact::query()->whereHas('comments', function ($query) {
            $query->where('created_at', '>=', now()->subWeek());
        })->get();
        return $this->sendSuccess($postsWithRecentComments,"success");
    }
}
