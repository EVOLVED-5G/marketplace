<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Netapp;
use App\Models\NetappType;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ProductCatalogueController extends Controller
{
    public function index()
    {
        $allTags = [];
        $categories = Category::all();
        $types = NetappType::all();
        $tags = Netapp::active()->pluck('tags')->toArray();
        foreach ($tags as $tag) {
            if (is_array($tag)) {
                array_push($allTags, ...$tag);
            }
        }
        $uniqueTags = ['tags' => array_unique($allTags)];
        return view('product-catalogue', compact('categories', 'types', 'uniqueTags'));
    }
    public function filter()
    {
        try {
            $netapps = app(Pipeline::class)->send(Netapp::query())->through([
                \App\QueryFilters\NetappFilter\Name::class,
                // \App\QueryFilters\NetappFilter\BusinessName::class,
                \App\QueryFilters\NetappFilter\CategoryId::class,
                \App\QueryFilters\NetappFilter\Tags::class,
                \App\QueryFilters\NetappFilter\TypeId::class,

            ])->thenReturn()->with(['category', 'logo', 'pdf', 'user', 'savedNetapp'])->active()->paginate(10);
            return response()->json(array('data' => $netapps));
        } catch (\Exception $e) {
            return response()->json(array('error' => $e->getMessage()));
        }
    }
}
