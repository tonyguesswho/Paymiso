<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class CreateAddress extends Model
{
    protected $fillable = [

    'user_id','btc_wallet_id'
    ];

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }
}
