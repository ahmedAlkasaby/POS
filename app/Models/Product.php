<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Iterator;

class Product extends Model implements TranslatableContract
{
    use Translatable, HasFactory;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = [
        'image',
        'price',
        'selling_price',
        'qty',
        'category_id',
    ];

    public function scopeFilter($query, $search = null,$category_id = null)
    {
        $query->when($search, function ($q, $search) {
            $q->whereHas('translations', function ($query) use ($search) {
                $query
                ->where('locale', app()->getLocale())
                ->where('name', 'like', '%' . $search . '%');
            });
        });
        $query->when($category_id,function($q,$category_id){
            $q->where('category_id',$category_id);
        });


    }


    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id','id');
    }

    public function gain(){
        $gain=$this->selling_price-$this->price;
        $gain_rated=$gain*100/$this->price;
        return number_format($gain_rated);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'product_id','id');
    }

    public function ItemsOrder()
    {
        return $this->hasMany(ItemOrder::class,'product_id','id');
    }

    public function checkProductInCartWithClient($clientId){
        $cart=Cart::where('product_id',$this->id)->where('client_id',$clientId)->first();
        if($cart){
            return true;
        }else{
            return false;
        }

    }
}
