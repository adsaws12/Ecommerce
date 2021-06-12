<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBuyItem extends Model
{
    protected $guarded = [];

    public function transactions(){
        return $this->morphMany('App\Transaction', 'transactionable');
    }  
    public function item(){
        return $this->belongsTo('App\Item');
    }
}
