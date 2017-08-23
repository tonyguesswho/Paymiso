<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class MarketPlace extends Model
{
    protected $fillable = [
    'user_id','name','email','phone','amount_dollar','comments'
    ];

    public function User(){
    	
    	return $this->belongsTo('MyEscrow\User');
    }
}
