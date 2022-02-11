<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function fetchCategory()
    {
        $category = Category::all();
        return response(['data' => $category, 'message' => 200]);
    }
}
