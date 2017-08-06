<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Swap;

class ExchangeRate extends Model
{
    public function rate(){

    	$rate = Swap::latest('USD/NGN');
		$finalrate=$rate->getValue();

		return $finalrate;

    }
}
