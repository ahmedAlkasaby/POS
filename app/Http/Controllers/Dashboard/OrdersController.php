<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrder;
use App\Models\Client;
use App\Models\ItemOrder;
use App\Models\Location;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders=Order::filter(request('payment_method'),request('payment_status'),request('status'),request('client_id'))->orderBy('id','desc')->paginate(5);
        return view('Dashboard.order.index',compact('orders'));
    }



    function edit(string $id)
    {
        $order=Order::find($id);
        $clients=Client::all();
        $items=ItemOrder::where('order_id',$id)->paginate(2);
        return view('Dashboard.order.edit',compact('order','clients','items'));
    }


    public function update(UpdateOrder $request, string $id)
    {
        Order::where('id',$id)->update([
            'status'=>$request->status,
            'payment_status'=>$request->payment_status,
            'payment_method'=>$request->payment_method,
            'total_price'=>$request->total_price,
        ]);

        Location::where('order_id',$id)->update([
            'city'=>$request->city,
            'area'=>$request->area,
            'street'=>$request->street
        ]);

        session()->flash('orderUpdate',__('site.orderUpdate'));
        return back();
    }


    public function destroy(string $id)
    {
        try {
            ItemOrder::where('order_id',$id)->delete();
            Location::where('order_id',$id)->delete();
            Order::where('id',$id)->delete();
            session()->flash('orderDelete',__('site.orderDelete'));
            return back();
        } catch (\Throwable $th) {
            session()->flash('canNotDeleteOrder',__('site.canNotDeleteOrder'));
            return back();
        }

    }
}
