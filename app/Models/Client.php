<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'phone',
        'address',
    ];

    protected $cast=[
        'phone'=>'array'
    ];

   public function scopeFilter($quary ,$search=null){
       return $quary->when($search,function($q) use($search){
           $q->where('name','like','%'.$search.'%')
           ->orWhere('phone','like','%'.$search.'%')
           ->orWhere('address','like','%'.$search.'%');
       });
   }

   public function orders()
    {
        return $this->hasMany(Order::class,'client_id','id');
    }

    public function CheckCountOfCartsToClient(){
        $carts=Cart::where('client_id',$this->id)->count();
        if($carts>0){
            return true;
        }else{
            return false;
        }
    }
}
