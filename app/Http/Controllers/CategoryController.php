<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|unique:categories|min:3',
        ]);

        // Model / Insertion BDD
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        // On pourra faire ça plus tard...
        // Category::create($request->all()); Même chose que les 3 lignes au dessus

        return redirect('/caterogies');
    }
}
