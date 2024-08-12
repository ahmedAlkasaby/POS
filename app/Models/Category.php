<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable ,HasFactory ;

    protected $fillable=['name'];

    public $translatedAttributes = ['name'];



    public function scopeFilter($query, $search = null)
    {
        $query->when($search, function ($q, $search) {
            $q->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
