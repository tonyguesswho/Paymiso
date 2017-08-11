<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class cancled_mail extends Model
{
    protected $fillable = [
    'name','reason','sellcoin_id'
    ];

    public function SellCoin(){
    	return $this->belongsTo('MyEscrow\SellCoin');
    }

    public function Transaction(){
    	return $this->belongsTo('MyEscrow\Transaction');
    }

}
