<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Shop extends Model
{
    public function products()
    {
        return belongsToMany(Product::class);
    }
    
    public function user()
    {
        return belongsTo(User::class);
    }
}
