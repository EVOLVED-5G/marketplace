<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NetappType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $types = NetappType::all();
        return view('dashboard', compact('categories', 'types'));
    }
}
