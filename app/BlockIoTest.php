<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaraBlockIo;

class BlockIoTest extends Model
{
    public function Test(){

    	return LaraBlockIo::getBalanceInfo();
    }
}
