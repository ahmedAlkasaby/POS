<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'city',
        'area',
        'street',
        'frist_name',
        'last_name',
        'phone',
        'zip_code'
    ];

    public function order()
    {
        return $this->hasOne(Order::class,'order_id','id');
    }
}
