<?php

namespace MyEscrow;

use Illuminate\Database\Eloquent\Model;
use Swap;

class ExchangeRate extends Model
{
    public function rate(){

    	$rate = Swap::latest('USD/EUR');
		$finalrate=$rate->getValue();

		return $finalrate;

    }
}
