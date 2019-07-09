<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;

class Product extends Model
{
    protected $fillable = ['title','description','price','inventory','shop_id'];
    
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
