<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class SellCoin extends Model
{
    protected $fillable = [
    'user_id','wallet_id','buyer_email','escrow_fee','buyer_phone','amount_dollar','amount_btc','rate'
    ];

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }

    public function Transaction(){
    	return $this->hasOne('MyEscrow\Transaction');
    }

    public function CanceledMail(){
    	return $this->hasMany('MyEscrow\CanceledMail');
    }
}
