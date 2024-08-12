<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:clients-read')->only('index');
        $this->middleware('permission:clients-create')->only('create');
        $this->middleware('permission:clients-create')->only('store');
        $this->middleware('permission:clients-update')->only('update');
        $this->middleware('permission:clients-update')->only('edit');
        $this->middleware('permission:clients-delete')->only('destroy');
    }

    public function index()
    {
        $clients=Client::filter(request('search'))->paginate(4);
        return view('Dashboard.client.index',compact('clients'));
    }



    public function create()
    {
        return view('Dashboard.client.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|numeric|min:11',
            'address'=>'required|string'
        ]);

        Client::create($request->except('_token'));

        session()->flash('createClient',__('site.createClient'));
        return back();
    }




    public function edit(string $id)
    {
        $client=Client::find($id);
        return view('Dashboard.client.edit',compact('client'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string',
            'phone'=>'required|numeric|min:11',
            'address'=>'required|string'
        ]);


        Client::where('id',$id)->update( $request->except('_token','_method'));

        session()->flash('editClient',__('site.editClient'));
        return back();
    }


    public function destroy(string $id)
    {
        try {
            Client::where('id',$id)->delete();
            session()->flash('deleteClient',__('site.deleteClient'));
            return back();
        } catch (\Throwable $th) {
            session()->flash('canNotDeleteClient',__('site.canNotDeleteClient'));
            return back();
        }

    }
}
