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
        $data = Category::orderBy('name', 'asc')->get();
        return view('categories.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,except,id|max:50',
            // 'parent' => 'nullable|integer'
        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        if ($request->parent) {

            # find parent
            $node = Category::findOrFail($request->parent);

            # save category as parent
            $node->appendNode($category);

        }


        Session::flash('success', 'Category added');
        return redirect()->back();
    }

    public function all()
    {
    //    $data = Category::with(['ancestors'])->paginate(30);
        $data = Category::get()->toTree();





      //  return view('categories.all',compact('data'));
        return $data;
        //return $data->ancestors;
        return $data->descendants;
    }
}
