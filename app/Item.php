<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function userbuyitems(){
        return $this->hasMany('App\UserBuyItem');
    }
}
