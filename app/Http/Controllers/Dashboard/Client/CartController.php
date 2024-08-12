<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:orders-read')->only('index');
        $this->middleware('permission:orders-create')->only('store');
        $this->middleware('permission:orders-update')->only('update');
        $this->middleware('permission:orders-delete')->only('destroy');
    }

    public function index($clientId)
    {
        $carts=Cart::where('client_id',$clientId)->paginate(5);
        $client=Client::find($clientId);
        return view('Dashboard.cart.index',compact('carts','client'));
    }




    public function store(Request $request ,$clientId)
    {
        $product=Product::find($request->product_id);
        $cart=Cart::where('product_id',$product->id)->where('client_id',$clientId)->first();
        if($cart){
            Cart::where('id',$cart->id)->delete();
            Cart::create([
                'product_id'=>$request->product_id,
                'qty'=>1,
                'client_id'=>$clientId,
                'sub_total'=>$product->selling_price,
            ]);
        }else{
            Cart::create([
                'product_id'=>$request->product_id,
                'qty'=>1,
                'client_id'=>$clientId,
                'sub_total'=>$product->selling_price,
            ]);
        }
        return back();
    }

    public function updateCart($clientId,$cartId,$status){
        $cart=Cart::find($cartId);
        $productPrice=$cart->product->selling_price;
        $productQty=$cart->product->qty;
        if($status=='plus'){
            if($cart->qty < $productQty){
                Cart::where('id',$cartId)->update([
                    'qty'=>($cart->qty +=1),
                    'sub_total'=>($productPrice*($cart->qty+=1))
                ]);
            }
        }else{
            if($cart->qty >1){
                Cart::where('id',$cartId)->update([
                    'qty'=>($cart->qty -=1),
                    'sub_total'=>($productPrice*($cart->qty-=1))
                ]);
            }
        }

        return back();
    }

    public function destroy( $clientId,$cartId)
    {
        
        Cart::where('id',$cartId)->where('client_id',$clientId)->delete();
        session()->flash('success',__('site.deleteCart'));
        return back();
    }
}
