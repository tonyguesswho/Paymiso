<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $fillable = [
    'user_id' , 'rate', 'availability','negotiable','username'
    ];

    public function User(){
    	return $this->belongsTo('MyEscrow\User');
    }
}
