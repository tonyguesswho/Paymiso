<?php

namespace MyEscrow;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'phone', 'password','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function SellCoin(){

        return $this->hasMany('MyEscrow\SellCoin');
    }

    public function BankDetails(){

        return $this->hasOne('MyEscrow\BankDetails');
    }

    public function CreateAddress(){
        return $this->hasOne('MyEscrow\CreateAddress');
    }

    public function MarketPlace(){
        return $this->hasMany('MyEscrow\MarketPlace');
    }

    public function Rate(){
        return $this->hasMany('MyEscrow\Rate');
    }

    public function Withdrawal(){
        return $this->hasMany('MyEscrow\Withdrawal');
    }
}
