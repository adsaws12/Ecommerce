<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    protected $guarded = [];
    

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function usergiftcards(){
        return $this->hasMany('App\UserGiftCard');
    }
}
