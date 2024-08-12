<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $categories=Category::all();
        $products=Product::filter(request('search'),request('category_id'))->paginate(4);
        return view('Dashboard.product.index',compact('categories','products'));
    }


    public function create()
    {
        $categories=Category::get();
        return view('Dashboard.product.create',compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        if($request->file('image')){
            $data=$request->except(['image','_token']);
            $image=Storage::putFile($request->file('image'));
            $data['image']=$image;
        }else{
            $data=$request->except(['_token']);
        }

        Product::create($data);

        session()->flash('createProduct',__('site.createProduct'));
        return back();
    }





    public function edit(string $id)
    {
        $categories=Category::get();
        $product=Product::find($id);
        return view('Dashboard.product.edit',compact('product','categories'));
    }


    public function update(ProductRequest $request, Product $product)
    {

        if($request->file('image')){
            $data=$request->except(['image','_token']);
            $image=Storage::putFile($request->file('image'));
            $data['image']=$image;
            if($product->image == 'default.jpg'){

            }else{
                unlink('uploads/'.$product->image);
            }
        }else{
            $data=$request->except(['_token']);
        }

        $product->update($data);

        session()->flash('updateProduct',__('site.updateProduct'));
        return back();

    }


    public function destroy(string $id)
    {
        try {
            ProductTranslation::where('product_id',$id)->delete();
            Product::where('id',$id)->delete();
            session()->flash('deleteProduct',__('site.deleteProduct'));
            return back();

        } catch (\Throwable $th) {
            session()->flash('canNotDeleteProduct',__('site.canNotDeleteProduct'));
            return back();
        }

    }


}
