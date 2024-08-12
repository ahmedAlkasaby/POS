<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'client_id',
        'product_id',
        'qty',
        'sub_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    


}
