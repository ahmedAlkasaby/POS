<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories-read')->only('index');
        $this->middleware('permission:categories-create')->only('create');
        $this->middleware('permission:categories-create')->only('store');
        $this->middleware('permission:categories-update')->only('update');
        $this->middleware('permission:categories-update')->only('edit');
        $this->middleware('permission:categories-delete')->only('destroy');
    }
    public function index()
    {
        $categories=Category::filter(request('search'))->paginate(4);
        return view('Dashboard.category.index',compact('categories'));
    }


    public function create()
    {
        return view('Dashboard.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'ar.*'=>'required|string|unique:category_translations,name',
            'en.*'=>'required|string|unique:category_translations,name',
        ]);


        Category::create($request->all());
        $this->ReturnBack('success','createCategory');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $category=Category::find($id);
        return view('Dashboard.category.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {

        $request->validate([
            'ar.*'=>'required|string|unique:category_translations,name',
            'en.*'=>'required|string|unique:category_translations,name',
        ]);

        $category->update($request->all());

        $this->ReturnBack('success','updateCategory');

    }


    public function destroy(string $id)
    {
        try {
            CategoryTranslation::where('category_id',$id)->delete();
            Category::where('id',$id)->delete();
            $this->ReturnBack('deleteCategory','delete_category');
        } catch (\Throwable $th) {
            $this->ReturnBack('canNotDeleteCategory','canNotDeleteCategory');

        }

    }

    private function ReturnBack($flashTitle,$flashMessage){
        session()->flash($flashTitle,__('site.'.$flashMessage));
        return back();
    }
}
