<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class TwoFactor extends Model
{
    protected $fillable = [
    'user_id','confirmation_code'
    ];

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }
}
