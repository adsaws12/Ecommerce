<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function transactionable(){
        return $this->morphTo();
    }

    public function userbuyitem(){
        return $this->belongsTo('App\UserBuyItem', 'user_id');
    }
    
    public function usergiftcard(){
        return $this->belongsTo('App\UserGiftCard', 'user_id');
    }
}
