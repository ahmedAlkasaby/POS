<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\ItemOrder;
use App\Models\Location;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:orders-create')->only('create');
        $this->middleware('permission:orders-create')->only('store');
    }



    public function create($clientId)
    {
        $client=Client::find($clientId);
        $categories=Category::with('products')->get();
        return view('Dashboard.order.create',compact('client','categories'));
    }


    public function store(Request $request, $clientId)
    {

        $request->validate([
            'city'=>'required|string',
            'street'=>'required|string',
            'area'=>'required|string'
        ]);


        $carts=Cart::where('client_id',$clientId)->get();
        $total=0;
        foreach ($carts as $cart) {
            $total+=($cart->sub_total);
        }

        $order= Order::create([
            'client_id'=>$clientId,
            'status'=>'new',
            'payment_status'=>'waiting',
            'payment_method'=>'cash',
            'total_price'=>$total,
        ]);
        foreach ($carts as $cart) {
            ItemOrder::create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'qty'=>$cart->qty,
            ]);
            $product=Product::find($cart->product_id);
            Product::where('id',$cart->product_id)->update([
                'qty'=>($product->qty-$cart->qty)
            ]);
        }

        Cart::where('client_id',$clientId)->delete();

        $data=$request->except('_token');
        $data['order_id']=$order->id;

        Location::create($data);


        session()->flash('createOrder',__('site.createOrder'));
        return redirect()->route('client.index');

    }

}
