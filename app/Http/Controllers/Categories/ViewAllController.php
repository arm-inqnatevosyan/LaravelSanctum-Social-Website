<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewAllController extends BaseController
{
    public function __invoke(Request $request) {
        $id = $request->input('id');
        $categories = Category::query()->get();
        if ($id) {
            $contacts = Contact::query()->where('category', $id)->get();
            return $this->sendSuccess($contacts, 'success');
        }
        return $this->sendSuccess($categories, 'success');
    }
}
