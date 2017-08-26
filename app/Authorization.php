<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{	protected $fillable = [
		'fee','authorization_code', 'transaction_id','seller_id'
	];

    public function Transaction(){

    	return $this->belongsTo('MyEscrow\Transaction');
    }

}
