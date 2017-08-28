<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class SendInstantly extends Model
{
    protected $fillable = [
    'user_id', 'wallet_id', 'buyer_email', 'amount_dollar', 'amount_btc'
    ];

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }
}
