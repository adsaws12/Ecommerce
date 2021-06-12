<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGiftCard extends Model
{
    protected $guarded = [];

    public function transactions(){
        return $this->morphMany('App\Transaction', 'transactionable');
    }  

    public function giftcard(){
        return $this->belongsTo('App\GiftCard', 'gift_card_id');
    }    
}
