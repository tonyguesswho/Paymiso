<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =
    ['transaction_token','sell_coin_id','user_id'];

    public function SellCoin(){
    	
    	return $this->belongsTo('MyEscrow\SellCoin');
    }

      public function CanceledMail(){
      	
    	return $this->hasMany('MyEscrow\CanceledMail');
    }

    public function Authorization(){
        
        return $this->hasOne('MyEscrow\Authorization');
    }
}
