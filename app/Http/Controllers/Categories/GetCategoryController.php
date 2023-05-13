<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class GetCategoryController extends BaseController
{
    public function __invoke()
    {
        $contacts = Category::query()->get();
        return $this->sendSuccess($contacts,'success');
    }
}
