<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show($slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products()
            ->with(['vendor', 'vehicles'])
            ->where('status', 'published')
            ->latest()
            ->paginate(12);

        return view('category.show', compact('category', 'products'));
    }
}
