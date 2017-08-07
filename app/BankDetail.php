<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $fillable = [
    'user_id','bank_name','account_name','account_number'
    ];

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }
}
