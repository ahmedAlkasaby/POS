<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'client_id',
        'status',
        'payment_status',
        'payment_method',
        'currency',
        'total_price',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function items()
    {
        return $this->hasMany(ItemOrder::class,'order_id','id');
    }

    public function location()
    {
        return $this->hasOne(Location::class,'order_id','id');
    }

    public function CheckOrderClientOrUser(){
        $order=Order::find($this->id);
        if($order->client_id != null){
            return 'client';
        }elseif($order->user_id != null){
            return 'user';
        }
    }


    public function scopeFilter($query,$payment_method = null,$payment_status=null,$status=null, $client_id = null,)
    {

        $query->when($payment_method,function($q,$payment_method){
            $q->where('payment_method',$payment_method);
        });

        $query->when($payment_status,function($q,$payment_status){
            $q->where('payment_status',$payment_status);
        });

        $query->when($status,function($q,$status){
            $q->where('status',$status);
        });
        $query->when($client_id, function ($q, $clientId) {
            $q->where('client_id',$clientId);
        });



    }


}
