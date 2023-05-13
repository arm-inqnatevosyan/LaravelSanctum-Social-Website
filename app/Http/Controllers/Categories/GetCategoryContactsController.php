<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetCategoryContactsController extends BaseController
{
    public function __invoke(Request $request) {
        $id = $request->input('id');
        if ($id) {
            $contacts = Contact::query()->where('category', $id)->get();
            return $this->sendSuccess($contacts, 'success');
        }
        $categories = Category::query()->get();
        return $this->sendSuccess($categories, 'success');
    }
}
