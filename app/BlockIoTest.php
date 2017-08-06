<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaraBlockIo;


class BlockIoTest extends Model
{
    public function CreateAddress(){
    	$random = Str::random('5');
    	return LaraBlockIo::createAddress($random);
    }

    public function SendCoin(){
    	$amounts =  0.00693760;
    	$fromAddresses = '2MtqRw3pMPj1SkScvP6T6LczUdjbVurAUcq';
    	$toAddresses = '2NGSUqgRbrb8yxHW2FctyJdWhPNVtWoSbNs';

    	return LaraBlockIo::withdrawFromAddressesToAddresses($amounts, $fromAddresses, $toAddresses);
    }

    public function AddressInfo(){

    	return LaraBlockIo::getAddressesInfo();
    }

    public function GetUser(){

    	return LaraBlockIo::getUsers();
    }

    public function CurrentPriceInUsd(){

    	return LaraBlockIo::getCurrentPrice('USD');
    }
}
