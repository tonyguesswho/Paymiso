<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class CancledMail extends Model
{
    protected $fillable = [
    'name','user_id','reason','sellcoin_id'
    ];

    public function SellCoin(){
    	return $this->belongsTo('MyEscrow\SellCoin');
    }

    public function Transaction(){
    	return $this->belongsTo('MyEscrow\Transaction');
    }

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }
}
