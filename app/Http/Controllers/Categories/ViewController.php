<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ViewController extends Controller
{
    public function __invoke()
    {
        $contacts = Category::query()->get();
        return $contacts;
    }
}
