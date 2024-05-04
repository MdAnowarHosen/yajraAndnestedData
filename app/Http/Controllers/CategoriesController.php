<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
   public function index()
   {
        return view('categories.index');
   }

   public function getCategories()
   {
        return DataTables::of(Category::query())
        ->setRowId('id')
        ->setRowAttr([
            'align' => 'center',
        ])
        ->addColumn('action', 'categories.action.store_action')
        ->make(true);
   }

   public function create()
   {
        return view('categories.create');
   }

   public function store(Request $request)
   {
    $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|unique:categories,slug,except,id|max:50',
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->slug = $request->slug;
    $category->save();
    Session::flash('success', 'Category added');
    return redirect()->back();
   }

}
