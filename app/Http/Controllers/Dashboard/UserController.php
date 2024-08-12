<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Laratrust\Laratrust;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:users-read')->only('index');
        $this->middleware('permission:users-create')->only('create');
        $this->middleware('permission:users-create')->only('store');
        $this->middleware('permission:users-update')->only('update');
        $this->middleware('permission:users-update')->only('edit');
        $this->middleware('permission:users-delete')->only('destroy');
    }

    public function index(Request $request)
    {

        $users = User::admins($request->search)->latest()->paginate(5);
        return view('Dashboard.user.index',compact('users'));
    }


    public function create()
    {
        return view('Dashboard.user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:8|max:32'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $user->addRole('admin');

        $user->givePermissions($request->permissions);


        session()->flash('success',__('site.createUser'));

        return back();
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $user=User::find($id);
        return view('Dashboard.user.edit',compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'confirmed|min:8|max:32'
        ]);

        if($request->password){
            $user=User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
        }else{
            $user=User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);

        }

        $user=User::find($id);

        $user->syncPermissions($request->permissions);

        session()->flash('success',__('site.user_update'));

        return back();
    }


    public function destroy(string $id)
    {
        try {
            User::where('id',$id)->delete();
            session()->flash('deleteUser',__('site.delete_user'));
            return back();
        } catch (\Throwable $th) {
            session()->flash('canNotDeleteUser',__('site.canNotDeleteUser'));
            return back();
        }

    }
}
