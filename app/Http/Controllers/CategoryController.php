<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Contact;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __invoke() {
        $category = Category::with('contacts.comments')->get();
        return $category;
    }
}
